$(document).ready(function() {

    $('.post form').submit(function() {
     
        
        var title ,content,excerpt;
        title = $(".post form input[name='title']").val();
        content = $(".post form textarea").val();
        excerpt = $(".post form input[name='excerpt']").val();

        if(title.length <50 || title.length >200){
            $(".post form p.title-error").fadeIn();
            return false;
        }else{
            $(".post form p.title-error").fadeOut();
        }

        if(content.length <500 || content.length > 1000){
            $(".post form p.content-error").fadeIn();
            return false;
        }else{
            $(".post form p.content-error").fadeOut();
        }
        if(excerpt.length !== 0){
            if(excerpt.length < 100 || excerpt.length >500){
                $(".post form p.excerpt-error").fadeIn();
                return false;
            }else{
                $(".post form p.excerpt-error").fadeOut();
            }
        }
           return true;
        
       
    });
});