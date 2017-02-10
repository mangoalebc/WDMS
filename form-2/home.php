<html>
<style>
.menu
{
background-color: #00547E;
border-bottom: 4px solid #04A3ED;
width:100%;
height: auto;
padding: 0 10px;
position: fixed;
margin: 0px;
z-index: 1;
opacity: 0.9;
}

.menu  .navbar-nav > .active > a
{
background-color : #04A3ED;
color: white;
font-weight: bold;
}

.menu  .navbar-nav >  li >  a
{
font-size: 13px;
color: white;
padding: 10px 35px;

}
.menu  .navbar-nav >  li >  a:hover
{
background-color: #04A3ED;
}

.navbar-header > a
{
font-family: 'Ubuntu Condensed', sans-serif;
padding: 0px;
margin: 0px;
text-decoration: none;
color: white;
font-size: 25px;
padding: 5px 30px;
}
.navbar-header > a:hover
{
text-decoration: none;
color: #04A3ED;
}


</style>
<div
 class="menu">
    <div class="container-fluid">
		<div class="navbar-header">
			<a href="#">Bootsnipp</a>
		</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</div>
</div>
</html>
