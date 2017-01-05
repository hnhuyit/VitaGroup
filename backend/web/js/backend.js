var backend = (function(){

	function removeElement(){

		jQuery('tbody tr[data-key="11"]').remove();

	}
	function delSelect(){
		jQuery('.delselect').on('click',function(){

			var ax =[];
			jQuery('tbody input[type="checkbox"]:checked').each(function(){
				ax.push(jQuery(this).val());
			});
			if(ax.length != 0){
				jQuery.ajax({
				url:'/BDS/backend/web/user/deletes',
				method:'POST',
				dataType:'Json',
				data:{
					ids:ax
				},
				beforeSend:function(){

				},
				success:function(data){
					//alert(data.mes);
					//removeElement();
					window.location.reload();
				}
			});
			}
		});
	}
	function delUser(){
		jQuery('.deluser').on('click',function(){
			$id=jQuery(this).data('id');
			jQuery.ajax({
				url:'/BDS/backend/web/index.php?r=user/deluser',
				method:'POST',
				dataType:'Json',
				data:{
					id:$id
				},
				beforeSend:function(){

				},
				success:function(data){
					alert(data.message);
				}
			});
		});
	}
	return {
		delUser:delUser,
		delSelect:delSelect
	}
})();

jQuery(document).ready(function(){
	backend.delSelect();
	backend.delUser();
});