 
  $(function() {
    //при нажатии на кнопку с id="save"
    $('#save').click(function() {
      //переменная formValid
      var formValid = true;
      //перебрать все элементы управления input 
      $('input').each(function() {
      //найти предков, которые имеют класс .form-group, для установления success/error
      var formGroup = $(this).parents('.form-group');
      //найти glyphicon, который предназначен для показа иконки успеха или ошибки
      var glyphicon = formGroup.find('.form-control-feedback');
      //для валидации данных используем HTML5 функцию checkValidity
      if (this.checkValidity()) {
        //добавить к formGroup класс .has-success, удалить has-error
        formGroup.addClass('has-success').removeClass('has-error');
        //добавить к glyphicon класс glyphicon-ok, удалить glyphicon-remove
        glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
      } else {
        //добавить к formGroup класс .has-error, удалить .has-success
        formGroup.addClass('has-error').removeClass('has-success');
        //добавить к glyphicon класс glyphicon-remove, удалить glyphicon-ok
        glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
        //отметить форму как невалидную 
        formValid = false;  
      }
    });
    
    //проверить схожесть паролей 
     
    if($("#password").val() != $("#passwordagain").val()){
        
        var glyphicon1 = $("#password").parent().parent().find('.form-control-feedback');
        var glyphicon2 = $("#passwordagain").parent().parent().find('.form-control-feedback'); 
        glyphicon1.addClass('glyphicon-remove').removeClass('glyphicon-ok');        
        glyphicon2.addClass('glyphicon-remove').removeClass('glyphicon-ok');  
       $("#password").parent().parent().parent().addClass('has-error').removeClass('has-success'); 
       $("#passwordagain").parent().parent().parent().addClass('has-error').removeClass('has-success');
        $("#message").html("<span>пароли не совпадают</span>"); 
        formValid = false;   
    } else{ 
       $("#message").html("");  
    }
    
    
    
  }); //конец клика
  
  
  
  
}); 