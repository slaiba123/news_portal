  <div class="col-md-4">

          
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Recent News</h5>
            <div class="card-body">
                      <ul class="mb-0">
<?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

  <li>
                      <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                    </li>
            <?php } ?>
          </ul>
            </div>
          </div>


   <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Popular  News</h5>
            <div class="card-body">
                      <ul >
<?php
$query1=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId  order by viewCounter desc limit 5");
while ($result=mysqli_fetch_array($query1)) {

?>

  <li>
                      <a href="news-details.php?nid=<?php echo htmlentities($result['pid'])?>"><?php echo htmlentities($result['posttitle']);?></a>
                    </li>
            <?php } ?>
          </ul>
            </div>
          </div>

        </div>