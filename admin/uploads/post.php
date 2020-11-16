<?php include "inc/header.php";?>
<?php include "inc/navbar.php";?>
<?php include "inc/functions.php";?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['addpost'])){
            $title=filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
            $content=filter_input(INPUT_POST,'content',FILTER_SANITIZE_STRING);
            $category=filter_input(INPUT_POST,'category',FILTER_SANITIZE_STRING);
            $excerpt=filter_input(INPUT_POST,'excerpt',FILTER_SANITIZE_STRING);
            $tags=filter_input(INPUT_POST,'tags',FILTER_SANITIZE_STRING);

            $image =$_FILES['image'];
            $img_name =$image['name'];
            $img_tmp_name =$image['tmp_name'];
            $img_size =$image['size'];

            $error_msg="";
            if(strlen($title) < 100 || strlen($title) > 200){
                $error_msg = "Title must be between 100 and 200";
            }else if(strlen($content)<500 || strlen($content) >10000){
                $error_msg = "Title must be between 500 and 1000";
            }else if(! empty($excerpt)){
                if(strlen($excerpt) < 100 || strlen($excerpt) > 500){
                    $error_msg = "Title must be between 100 and 500";
                }
            }else{
                if(! empty($img_name)){
                    $img_extension =strtolower(explode('.',$img_name)[1]);
                   $allowed_extension = array('jpg','png','jpeg');
                   if(! in_array($img_extension,$allowed_extension)){
                       $error_msg = "Allowed Extension are jpg,png,jpeg";
                   }else if($img_size > 1000000){
                    $error_msg = "Image size must be less than 1mega";
                   }
                }
            }
            if(empty($error_msg)){
                
            }
        }
    }
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <?php include "inc/sidebar.php";?>
        </div>
        <div class="col-sm">
            <div class="post">
                <h3>Add New Post</h3>
                <form action="post.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Title"
                        autocomplete="off" required class="form-control">
                        <p class="error title-error">Title must be between 100 and 200 characters</p>
                    </div>

                    <div class="form-group">
                        <textarea name="content" rows="6" required autocomplete="off"
                        class="form-control" style="resize: none;"
                         placeholder="Enter Your Message here..."></textarea>
                         <p class="error content-error">Content must be between 500 and 1000 characters</p>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="category">
                            <?php foreach(get_categories() as $category){
                                echo "<option>";
                                echo $category['name'];
                                echo "</option>";
                                }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"
                         name="excerpt" placeholder="Excerpt (Optional)" autocomplete="off">
                         <p class="error excerpt-error">Excerpt must be between 100 and 500 characters</p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"
                         name="tags" placeholder="Tags" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control"
                         image="tags" name="image">
                    </div>
                    <input type="submit" value="AddPost" id="button"name="addpost"
                     class="btn btn-primary"style="float:right;" >
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "inc/footer.php";?>
