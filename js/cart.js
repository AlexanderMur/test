
jQuery(function($){
	xhrGET = function(href){
		xhr = new XMLHttpRequest()
		xhr.open('GET',href,true)
		xhr.send()
		return xhr
	}
	getTotal = function(){	
		d = $('form')[0].deliver.value
		lift = $('form')[0].lift.value
		floor = +$('form')[0].floor.value
		ttl = subtotal
		if(d == '1'){
			ttl = ttl + 600;
		}
		if(d == '2'){
			ttl = ttl + 600;
		}

		if(lift == '2'){
			ttl = ttl + 300
		}

		if(lift == '3'){
			ttl = ttl + floor * 100
		}
		return ttl

	}
	function updateCart(obj){
		table = $('.table-responsive') 
		table.html(obj.table_html)
		table.animate({opacity:1})
		$('.qtys').html(obj.qtys)
		$('.subtotal').html(new Intl.NumberFormat().format(obj.subtotal))
		$('.total').html(new Intl.NumberFormat().format(obj.total))
		subtotal = obj.subtotal
		isLoading = false
	}
	function basketInit(){
		isLoading = false
		subtotal = +nest.subtotal
		$('.wpcf7-form').removeAttr('novalidate')
		$(document).on('click', '.plus', function(){
			if(isLoading){
				return
			}
			isLoading = true
			input = $(this).parent().find('input')[0]
			val = +input.value + 1
			id = input.dataset.id
			floor = $('form')[0].floor.value
			d = $('form')[0].deliver.value
			$('.table-responsive tbody').animate({opacity:0.5})
			xhrGET(nest.wp_ajax_url + '?action=set_qty&id='+id+'&qty='+val+'&d='+d+'&floor='+floor).onload = function(){
				updateCart(JSON.parse(this.response))
			}
		})
		$(document).on('click', '.minus', function(){
			if(isLoading){
				return
			}
			isLoading = true
			input = $(this).parent().find('input')[0]
			val = input.value - 1
			id = input.dataset.id
			floor = $('form')[0].floor.value
			d = $('form')[0].deliver.value
			$('.table-responsive tbody').animate({opacity:0.5})
			xhrGET(nest.wp_ajax_url + '?action=set_qty&id='+id+'&qty='+val+'&d='+d+'&floor='+floor).onload = function(){
				updateCart(JSON.parse(this.response))
			}
		})
		$(document).on('blur', '.cart__input input', function(){
			if(isLoading){
				return
			}
			isLoading = true
			val = this.value
			id = this.dataset.id
			floor = $('form')[0].floor.value
			d = $('form')[0].deliver.value
			$('.table-responsive tbody').animate({opacity:0.5})
			xhrGET(nest.wp_ajax_url + '?action=set_qty&id='+id+'&qty='+val+'&d='+d+'&floor='+floor).onload = function(){
				updateCart(JSON.parse(this.response))
			}
		})
		$(document).on('click', '.del-item', function(){
			if(isLoading){
				return
			}
			isLoading = true
			id = this.dataset.id
			floor = $('form')[0].floor.value
			d = $('form')[0].deliver.value
			$('.table-responsive tbody').animate({opacity:0.5})
			xhrGET(nest.wp_ajax_url + '?action=remove_item&id='+id+'&d='+d+'&floor='+floor).onload = function(){
				updateCart(JSON.parse(this.response))
			}
			return false
		})
		$('.radio').click(function(){
			$('.total').html(new Intl.NumberFormat().format(getTotal()))
		})
		$('.floor')[0].oninput = function(){
			$('.total').html(new Intl.NumberFormat().format(getTotal()))
		}
	}
	nest.wp_ajax_url.replace(/https:|http:/g,location.protocol )
	if($('.table-responsive').length){
		basketInit()
	}
})