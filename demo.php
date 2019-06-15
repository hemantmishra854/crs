<?php include "profileheader.php"; ?>
<?php include "config.php"; 
session_start();
$std_id=$_SESSION['Student'];
?>

<div class="container-fluid" style="margin-top:150px;margin-bottom:200px;">
    <div class="row">

        <div class="col-12">

                    <p class="">
                        <?php
                        $query="select * from  tblStudentSkills where Std_ID='$std_id'";
                        $result=mysqli_query($mydb,$query);
                        if(mysqli_num_rows($result)>=1)
                        {
                        ?>
                        <form id="editKeySkillsForm" action="edit-key-skills.php">
                        <table class="table table-striped ">
                            <thead class="">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Skills</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                echo $i;
                                while ($arr4=mysqli_fetch_array($result)) {
                                    $i=$i+1;
                                echo '<tr>
                                    <th scope="row">'.$i.'</th>
                                    <td><input type="text" class="form-control" value="'.$arr4['Skills'].'" name="txtSkills" id="txtSkills'.$i.'" onkeyup="getClickedId(this.id)" /></td>
                                    <td>
                                        <button type="button" class="btn btn-link" id="btnEditKeySkills'.$i.'" onclick="getClickedId(this.id)">
                                        <i aria-hidden="true" class="fas fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link text-danger" id="btnDeleteKeySkills'.$i.'" onclick="getClickedId(this.id)">
                                        <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>';
                                }
                                ?>
                                
                            </tbody>
                        </table>

                    <label class="text-danger d-none" id="errKeySkills"></label>
                        </form>
                    <?php 
                   } else { echo "<p class='text-muted'>No skills are provided by you!</p>" ;} ?>
                    </p>

        </div>
    </div>
</div>

<script type="text/javascript">
    function getClickedId(clicked_id)
{
var id=clicked_id;
alert(id);
}
</script>
<?php include "footer.php"; ?>
