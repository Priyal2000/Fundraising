<?php
  require_once "header1.php";
 ?>
 <style type="text/css">   html,body {
  background-color: RGB(52, 73, 94);
}</style>
         <div style="margin-left: 60px;" class="col-md-11 content">
           <?php
           if(isset($_SESSION['form']) && !empty($_SESSION['form'])){
             echo "<p style='color:red;'>
              Please check and then click.</p>";
              unset($_SESSION['form']);
           }
           else if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
             echo "<p style='color:green;'>
              Viewed Invoice.</p>";
              unset($_SESSION['success']);
           }
            ?>
             <div>
             <form class="form-inline" method="post" action="bill.php" >
             <table  id="example" class="table table-striped">
                 <thead>
                   <tr>
                    <th></th>
                    <th> Donation ID</th>
                     <th>Doner Name</th>
                     <th>Amount</th>
                     <th>Purpose</th>
                     <th>Address</th>
                     <th>Cell No.</th>
                     <th>Date</th>
                     <th>Payment Status</th>
                     <th>Payment Type</th>
                   </tr>
                 </thead>
               </thead>
               <tbody>
                       <?php
                           $query="select * from doner";
                           $result=mysqli_query($link, $query);
                           while($row=mysqli_fetch_array($result))
                           {
                            if($row['d_name']==$_SESSION['user1'])
                            {
                          ?>
                               <tr>
                                      <td>
                                        <input type="radio" name="selected"
                                          value=<?php echo $row['d_id']?> />
                                      </td>
                                      <td><?php echo $row['d_id']?></td>
                                       <td><?php echo $row['d_name']?></td>
                                       <td><?php echo $row['d_amount']?></td>
                                       <td><?php echo $row['d_purpose']?></td>
                                       <td><?php echo $row['d_addr']?></td>
                                       <td><?php echo $row['d_cell']?></td>
                                       <td><?php echo $row['d_date']?></td>
                                       <td><?php echo $row['d_pay']?></td>
                                       <td><?php echo $row['d_paytype']?></td>
                               </tr>
                               
                           <?php
                           }
                         }
                           ?>
               </tbody>
               </table>
               <input type="submit" class="btn btn-primary btn-md"
                      value="Invoice" name="Invoice">
             </form>
             </div>
         </div>
     </div>
     <script>
     $(document).ready(function(){
         $('.navbar ul li.active').removeClass("active");
         $('.navbar ul li:nth-child(6)').addClass("active");
     });
     </script>
   </body>
</html>
