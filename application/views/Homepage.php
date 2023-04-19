<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url().'bootstrap/css/bootstrap.min.css'; ?>" >
    <title></title>
  </head>
  <body>
   <div class="jumbotron text-center">
     <h1>Bhavan's Vivekananda College</h1>
     <h3>SEC Registration</h3>

   </div>
   <table>
   <?php $sucess=$this->session->flashdata('inserted');
      if($sucess!='')
      { ?>
    <tr>

        <div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php
          echo $sucess; ?>
        </div>
      </td>
    </tr>
<?php }?>
</table>
   <form method="post" action="<?php echo base_url().'index.php/LoginController/login' ?>">

   <div class="container">
     <div class="row">

       <div class="col-lg-6 col-sm-12">
         <div class="card">
           <div class="card-body">
         <h3>Login here</h3>
         <p>Enter the valid details</p>
         <div class="form-group">
          <label for="rollnumber">Roll Number</label>
          <input type="text" name="rollnumber" value="<?php echo set_value('rollnumber') ?>" class="form-control">
          <span class="text-danger"><?php echo form_error('rollnumber'); ?></span>
         </div>
         <div class="form-group">
          <label for="aadharnumber">Aadhar Number</label>
          <input type="password" name="aadharnumber" value="<?php echo set_value('aadharnumber') ?>"  class="form-control">
          <span class="text-danger"><?php echo form_error('aadharnumber'); ?></span>
         </div>
         <div class="form-group">
           <button class="btn btn-primary" type="submit" value="Login">Login</button><br/>
           <label class="text-danger"><strong><?php echo $this->session->flashdata('error'); ?></strong></label>
         </div>
   </div>
 </div>
</div>
   <div class="col-lg-6 col-sm-12">

     <div class="card">
       <div class="card-header"><h2>Instructions for SEC IV Semester and VI Semester Course</h2>
         <p>Read the Instructions carefully</p></div>
           <ul class="list-group">
             <li class="list-group-item">Enter your 12 Digit Rollnumber correctly
                                         (EX: 1072--------)</li>
             <li class="list-group-item">Enter your Aadhar Number correctly in Aadharnumber box
                                         </li>
             <li class="list-group-item">After Successful login select one SEC Course carefully</li>
              <li class="list-group-item">Once course selected and submitted you can't change the SEC Course</li>

              <li class="list-group-item">Once course selected and select logout option</li>

              <li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(Life Sciences) IV Semester Program</u></b></li>
              <li class="list-group-item">Biochemistry: Clinical Laboratory Diagnostics</li>
              <li class="list-group-item">Biotechnology: Food Preservation and Adultration </li>
              <li class="list-group-item">Chemistry: Cheminformatics  </li>
              <li class="list-group-item">Genetics: Genetic Counseling  </li>
              <li class="list-group-item">Microbiology: Interactions with entrepreneurs in microbial technology and start ups  </li>
              <li class="list-group-item">Nutrition & Dietetics: Strategies of Weight Management </li>

              <li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(Life Sciences) VI Semester Program</u></b></li>
              <li class="list-group-item">Biochemistry: Computational Biochemistry</li>
              <li class="list-group-item">Biotechnology: Fermentation Technology </li>
              <li class="list-group-item">Chemistry: Cheminformatics  </li>
              <li class="list-group-item">Genetics: Medicinal Plants  </li>
              <li class="list-group-item">Microbiology: Mushroom Cultivation  </li>


              <!--<li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(Hons.) Data Science Program</u></b></li>
              <li class="list-group-item">1. Six Sigma and Reliability Theory (Statistics)</li>
              <li class="list-group-item">2. Web Programming (Computer Science)</li>-->

              <!--<li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(MPCs) Program</u></b></li>
              <li class="list-group-item">Maths Graph Theory</li>
              <li class="list-group-item">Physics Boolean Algebra </li>
              <li class="list-group-item">Computers .NET  </li>
              <li class="list-group-item">Computers GUI programming using JAVA  </li>-->

              <!--<li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(MSCs) Program</u></b></li>
              <li class="list-group-item">Maths Graph Theory</li>
              <li class="list-group-item">Statistics Data Analysis with SPSS II  </li>
              <li class="list-group-item">Computers .NET  </li>
              <li class="list-group-item">Computers GUI programming using JAVA  </li>-->

              <!--<li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(MECs) Program</u></b></li>
              <li class="list-group-item">Maths Graph Theory</li>
              <li class="list-group-item">Electronics Schematic Capture using Multisim  </li>
              <li class="list-group-item">Computers .NET  </li>
              <li class="list-group-item">Computers GUI programming using JAVA  </li>-->

              <!--<li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(Hons.) Data Science Program</u></b></li>
              <li class="list-group-item">1. Six Sigma and Reliability Theory (Statistics)</li>
              <li class="list-group-item">2. Web Programming (Computer Science)</li>-->

              <!--<li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(MPCs) Program</u></b></li>
              <li class="list-group-item">Maths Vector Analysis</li>
              <li class="list-group-item">Physics Electrical Circuit Networking </li>
              <li class="list-group-item">Computers Python  </li>


              <li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(MSCs) Program</u></b></li>
              <li class="list-group-item">Maths Vector Analysis</li>
              <li class="list-group-item">Statistics Data Analysis with Python II  </li>
              <li class="list-group-item">Computers Python  </li>


              <li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(MECs) Program</u></b></li>
              <li class="list-group-item">Maths Vector Analysis</li>
              <li class="list-group-item">Electronics Internet of Things  </li>
              <li class="list-group-item">Computers Python  </li>-->


              <!--<li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(Hons) Data Science Program</u></b></li>
              <li class="list-group-item">Statistics SEC - Statistical Quality Control - 25</li>

              <li class="list-group-item">Computers SEC-PC Maintenance- 25  </li>-->

              <!--<li class="list-group-item">Once course selected and select logout option</li>
              <li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(MiGC/BtGC/MiBiC/MNDC) Program</u></b></li>
              <li class="list-group-item">1.Mushroom Cultivation (Microbiology)</li>
              <li class="list-group-item">2.Basics in Biochemical Calculations & Biostatistics (Biochemistry)  </li>
              <li class="list-group-item">3.Genetically Modified Crops (Genetics)  </li>
              <li class="list-group-item">4.Integrated Pest Management (Biotechnology)  </li>
              <li class="list-group-item">5.Nutraceuticals Functional & Novel Foods (nutrition & Dietics)  </li>
              <li class="list-group-item">6.Safety rules in Chemistry Laboratory & Preparing Lab Reagents (Chemistry)  </li>-->

              <!--<li class="list-group-item"><b><u>Offered SEC Courses for B.Sc(MiGC/BtGC/MiBiC) Program</u></b></li>
              <li class="list-group-item">1.Clinical Microbiology</li>
              <li class="list-group-item">2. Automation & Clinical Laboratory Informatics  </li>
              <li class="list-group-item">3. Vermicomposting  </li>
              <li class="list-group-item">4. Plant Tissue Cluture  </li>
              <li class="list-group-item">5. Basic Analytical Chemistry  </li>-->

             <!--<li class="list-group-item">Once course selected and select logout option</li>
             <li class="list-group-item"><b><u>Offered SEC Courses for BSc(MSCs) Program</u></b></li>
             <li class="list-group-item">1.Graph Theory</li>
             <li class="list-group-item">2. Data Analysis with SPSS II  </li>
             <li class="list-group-item">3. GUI Programming using Java  </li>
             <li class="list-group-item">4. .NET  </li>


             <li class="list-group-item"><b><u>Offered SEC Courses for BSc(MECs) Program</u></b></li>
             <li class="list-group-item">1.Graph Theory</li>
             <li class="list-group-item">2. Schematic Capture using Multisim  </li>
             <li class="list-group-item">3. GUI Programming using Java  </li>
             <li class="list-group-item">4. .NET  </li>


             <li class="list-group-item"><b><u>Offered SEC Courses for BSc(MPCs) Program</u></b></li>
             <li class="list-group-item">1.Graph Theory</li>
             <li class="list-group-item">2. Boolean Algebra  </li>
             <li class="list-group-item">3. GUI Programming using Java  </li>
             <li class="list-group-item">4. .NET  </li>-->



            <!--<li class="list-group-item"><b><u>Offered GE Courses for BSc(MSCs/MPCs/MECs) Program</u></b></li>
             <li class="list-group-item">1.Contagious Diseases and Immunisation (Microbiology )   </li>
             <li class="list-group-item">2. Introduction to Banking  (Commerce)   </li>
             <li class="list-group-item">3. Business Etiquettes  (Commerce)    </li>
             <li class="list-group-item">4. Business Organisation  (Commerce)  </li>
             <li class="list-group-item">5. Elements of Marketing (Management)   </li>
             <li class="list-group-item">6. Entrepreneurial Skills (Management)  </li>
             <li class="list-group-item">7. Film Appreciation (Mass Comm.)    </li>
             <li class="list-group-item">8. Intellectual Property Rights (Pol. Sc.)   </li>
             <li class="list-group-item">9. Environmental Economics  (Economics )   </li>-->

            <!-- <li class="list-group-item"><b><u>Offered GE Courses for BSc(MiGC/BtGC/MiBiC) Program</u></b></li>
              <li class="list-group-item">1. Mathematical Aptitude-2 ( Mathematics)</li>
              <li class="list-group-item">2. Biophysics (Phy & Electronics) </li>
              <li class="list-group-item">3. Introduction to Banking  (Commerce)  </li>
              <li class="list-group-item">4. Film Appreciation (Mass Comm.)</li>
              <li class="list-group-item">5. Intellectual Property Rights (Pol. Sc.)  </li>
              <li class="list-group-item">6. Environmental Economics  (Economics ) </li>
              <li class="list-group-item">7. Elements of Marketing (Management)    </li>
              <li class="list-group-item">8. Entrepreneurial Skills (Management)   </li>-->



             <!--<li class="list-group-item"><b><u>Offered GE Courses for B. Com(Gen) & BBA Program</u></b></li>
              <li class="list-group-item">1. Mathematical Aptitude-2 ( Mathematics)</li>
              <li class="list-group-item">2. Data analysis with SPSS ( Statistics) </li>
              <li class="list-group-item">3. E- commerce (Comp.Sc.)</li>
              <li class="list-group-item">4. Biophysics (Phy & Electronics)</li>
              <li class="list-group-item">5. Chemistry of Cosmetics ( Chemistry)  </li>
              <li class="list-group-item">6. Wine Making (Gen & Biotech) </li>
              <li class="list-group-item">7.Contagious Diseases and Immunisation (Microbiology )   </li>
              <li class="list-group-item">8. Human Physiology (Biochemistry)  </li>
              <li class="list-group-item">9. Film Appreciation (Mass Comm.) </li>
              <li class="list-group-item">10. Intellectual Property Rights (Pol. Sc.) </li>

             <li class="list-group-item"><b><u>Offered GE Courses for B. Com(Comp)</u></b></li>
              <li class="list-group-item">1. Mathematical Aptitude-2 ( Mathematics)</li>
              <li class="list-group-item">2. Data analysis with SPSS ( Statistics) </li>
              <li class="list-group-item">3. Biophysics (Phy & Electronics)</li>
              <li class="list-group-item">4. Chemistry of Cosmetics ( Chemistry)</li>
              <li class="list-group-item">5. Wine Making (Gen & Biotech)  </li>
              <li class="list-group-item">6.Contagious Diseases and Immunisation (Microbiology )  </li>
              <li class="list-group-item">7. Human Physiology (Biochemistry)</li>
              <li class="list-group-item">8. Film Appreciation (Mass Comm.)  </li>
              <li class="list-group-item">9. Intellectual Property Rights (Pol. Sc.)</li>-->



            <!--<li class="list-group-item"><b><u>Offered GE Courses for BSc(MSCs/MPCs/MECs) Program</u></b></li>
             <li class="list-group-item">1. Nutrition and Health (Biochemistry ) </li>
             <li class="list-group-item">2. Awareness of Tax Planning (Commerce)   </li>
             <li class="list-group-item">3. Basics of Accounts (Commerce)  </li>
             <li class="list-group-item">4. Business Ethics (Commerce)  </li>
             <li class="list-group-item">5. Basics of Journalism (Mass Comm.)   </li>
             <li class="list-group-item">6. Alternative Dispute ResolutionUnder Indian Constitution (Pol. Sc). </li>
             <li class="list-group-item">7. Basics of Economics ( Economics)</li>
             <li class="list-group-item">8. Basics of Financial Planning (Management)  </li>
             <li class="list-group-item">9. Counselling and Guidence (Management)   </li>-->




          <!-- <li class="list-group-item"><b><u>Offered GE Courses for BSc(MiGC/BtGC/MiBiC) Program</u></b></li>
           <li class="list-group-item">1. Data Analysis with Excel (Statistics ) </li>
           <li class="list-group-item">2. Awareness of Tax Planning (Commerce)   </li>
           <li class="list-group-item">3. Basics of Journalism (Mass Comm.)    </li>
           <li class="list-group-item">4.  Alternative Dispute ResolutionUnder Indian Constitution (Pol. Sc).   </li>
           <li class="list-group-item">5. Mathematical Aptitude 1 ( Maths ) </li>
           <li class="list-group-item">6. Basics of Python  (Comp.Science)</li>
           <li class="list-group-item">7. Basics of Economics ( Economics)</li>
           <li class="list-group-item">8. Counselling and Guidence (Management)  </li>-->



        <!--<li class="list-group-item"><b><u>Offered GE Courses for BA Program</u></b></li>
         <li class="list-group-item">1. E- commerce (Comp.Sc.) </li>
         <li class="list-group-item">2. Chemistry of Cosmetics ( Chemistry)    </li>
         <li class="list-group-item">3. Business Etiquettes  (Commerce)    </li>
         <li class="list-group-item">4. Elements of Marketing (Management)       </li>
         <li class="list-group-item">6. Human Physiology (Biochemistry)    </li>-->




           </ul>
     </div>
</div>
 </div>
</div>
</form>
  </body>
  <script type="text/javascript">
    window.setTimeout(function () {
      $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 100000);
    </script>
  <footer class="page-footer font-small blue pt-4">
     <div class="footer-copyright text-center py-3">© Developed by L.Naveen kumar Msc(Computer Science) 2016-18 <br/>Bhavans Vivekananda College

</footer>
</html>
