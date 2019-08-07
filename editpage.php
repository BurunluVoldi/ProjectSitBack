<?php 
include "databs.php";
session_start();

if(isset($_GET["newest_id"])){
    $statement=$connect->prepare("SELECT * FROM pages WHERE id='".$_GET["newest_id"]."'");
    $statement->execute();
    $result = $statement->fetch();
    
    $title=$result["title"];
    $date=$result["date"];
    $text=$result["text"];
}
?>

    <form id="forum" action="editsave.php?id=<?php echo $_GET['newest_id'];?>" method="POST">
        <div class="modal-header">
            <h3 class="modal-title"><?php echo date("d-m-Y",strtotime($date)); ?> dated entry</h3>
            <button type="button" class="close" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="form-group">
                
                    <label>Date</label>
                    <input name="date" class="form-control" type="date" value="<?php echo $date?>">
                    
                    <label>Title</label>
                    <input name="title" class="form-control" type="text" value="<?php echo $title?>">
                    
                    <label>Text</label>
                    <textarea name="text" rows="15" class="form-control" form="forum"><?php echo $text?></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn-warning btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn-primary btn" name="submitte">Save</button>
        </div>
    </form>