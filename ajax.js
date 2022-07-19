$(document).ready(function(){
    $('.qnt').siblings().on('click',function(){
        val = $(this).parent().find('input').val()
        id = $(this).parent().find('input').parent().parent().next().next().children().children().eq(0).val();
        $.ajax({
            type: 'get',
            url : 'Editqnt.php',
            data : 'id='+id+'&qnt='+val,
            success: function(){
                window.location.href = 'panier.php';
            }
        })
    });
    $('.remove').click( function(){
        id = $(this).children('.idrem').val();
        console.log(id)
        $.ajax({
            type: 'get',
            url : 'removepanier.php',
            data : 'id='+id,
            success: function(){
                window.location.href = 'panier.php';
            }
        });
    });
  	$('#sendEmail').submit(function(e){
        e.preventDefault();
     	$.ajax({
         	type: 'post',
            url: 'sendEmail.php',
            data : $(this).serialize(),
          	success : function(html){
              if(html == 'send'){
               $('#sendmsg').css( 'opacity' , '1' );
              }
            }
        });
    });
    $('#saveForm').submit(function(e){
        e.preventDefault(); 
        $.ajax({
            type: 'post',
            url: 'saveDemande.php',
            data : $(this).serialize(),
            success : function(html){
                if( html == 'fnameErr'){
                    $('#fname').addClass('is-invalid');
                }
                else{
                    $('#fname').removeClass('is-invalid');
                }
                if( html == 'lnameErr'){
                    $('#lname').addClass('is-invalid');
                }
                else{
                    $('#lname').removeClass('is-invalid');
                }
                if( html == 'emailErr'){
                    $('#email').addClass('is-invalid');
                }
                else{
                    $('#email').removeClass('is-invalid');
                }
                if( html == 'phoneErr'){
                    $('#phone').addClass('is-invalid');
                }
                else{
                    $('#phone').removeClass('is-invalid');
                }
                if( html == 'addErr'){
                    $('#address').addClass('is-invalid');
                }
                else{
                    $('#address').removeClass('is-invalid');
                }
                if( html == 'true'){
                    $('.msg').html( '<div class="alert alert-success"> Votre demende a été enregistré</div>')
                }
                else{ 
                    console.log(html)
                }
            }
        })
    })
});