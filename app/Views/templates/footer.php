            </div>
        </div> 
    </div>
    </body>
    <!-- Jquery JS-->
    <script src="/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS-->
    <script src="/vendor/slick/slick.min.js">
    </script>
    <script src="/vendor/wow/wow.min.js"></script>
    <script src="/vendor/animsition/animsition.min.js"></script>
    <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/vendor/select2/select2.min.js"></script>
    <!-- Main JS-->
    <script src="/js/main.js"></script>
     <?php if (isset($message)) : ?>
        <script type="text/javascript">
        let para = document.createElement("div");
        para.innerHTML = "<?= $message ?>";
        document.getElementById("message").appendChild(para);
    </script>
    <?php endif ?>
    <script type="text/javascript">
   function PrintDiv() {    
  var divToPrint = document.getElementById('divToPrint');
  const w = window.open();
  w.document.open();
  w.document.write('<html><body onload="window.print()"><table align="center" border="1">' + divToPrint.innerHTML + ' </table><br><table align="center"><tr><td>Disediakan oleh:</td>&nbsp;&nbsp;&nbsp;<td>Disemak oleh:</td><br></tr><tr><td>Tandatangan:<input type="text" class="signature" /></td>&nbsp;&nbsp;&nbsp;<td>Tandatangan:<input type="text" class="signature" /></td><br></tr><tr><td>Nama:<input type="text" class="signature" /></td>&nbsp;&nbsp;&nbsp;<td>Nama:<input type="text" class="signature" /></td><br></tr><tr><td>Tarikh:<input type="text" class="signature" /></td>&nbsp;&nbsp;&nbsp;<td>Tarikh:<input type="text" class="signature" /></td><br></tr></table><style type="text/css">.signature { border: 0; border-bottom: 1px solid #000;} </style></html>');
  w.document.close();
}
       $(document).ready(function () {
       $('#sidebarCollapse').on('click', function () {
       $('#sidebar').toggleClass('active');
       $('#menu-sidebar').toggleClass('active');
            });
        });
    </script>
   
  </head>
</body>
</html>
<!-- end document-->
