
 <div class="card-body px-0 pt-0 pb-2">
   <div class="table-responsive p-0">
     <table class="table align-items-center justify-content-center mb-0">

       <thead>
         <tr>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">USN</th>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER-1</th>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER-2</th>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER-3</th>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER-4</th>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER-5</th>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER-6</th>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER-7</th>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER-8</th>
         </tr>
       </thead>
       <tbody>
         <?php

          $roll_no = $_SESSION['user_id'];
          $query = "select ST_NO, Sem1Per,Sem2Per,Sem3Per,Sem4Per,Sem5Per,Sem6Per,Sem7Per,Sem8Per from studentmaster where ST_NO='$roll_no'";
          $run = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($run)) {
          ?>
           <tr>
             <td><?php echo $row['ST_NO'] ?></td>
             <td><?php echo $row['Sem1Per'] ?></td>
             <td><?php echo $row['Sem2Per'] ?></td>
             <td><?php echo $row['Sem3Per'] ?></td>
             <td><?php echo $row['Sem4Per'] ?></td>
             <td><?php echo $row['Sem5Per'] ?></td>
             <td><?php echo $row['Sem6Per'] ?></td>
             <td><?php echo $row['Sem7Per'] ?></td>
             <td><?php echo $row['Sem8Per'] ?></td>

           </tr>

         <?php
          }
          ?>
       </tbody>

     </table>
   </div>
 </div>