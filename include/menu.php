<link rel="stylesheet" type="text/css" href="../style/menu.css">
<section>
 <div class="hamburger">
   <span class="line line1"></span>
   <span class="line line2"></span>
   <span class="line line3"></span>
 </div>
 <div class="sidebar">
   <ul class="sidebar-items">
	<a href="../action/myorder.php"><li class="item">My Order</li></a>
     <a href="../action/feedback.php"><li class="item">Feedback</li></a>
     <a href="../action/aboutus.html"><li class="item">About us</li></a>
     <a href="../action/contactus.html"><li class="item">Contect us</li></a>
     
   </ul>
 </div>

</section>

<script>
const hamburger = document.querySelector('.hamburger');
const sidebar = document.querySelector('.sidebar');

hamburger.addEventListener('click',()=>{
  hamburger.classList.toggle('clicked');sidebar.classList.toggle('show');
})
</script>