<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<title>Acme Web Design | Welcome</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <header>
    	<div class="container">
    		<div id="branding">
                <h1> 
                <span class="highlight">EGROCER-LIST</span>
                Listing Planner
                </h1>
            </div>
    		<nav>
    			<ul>
    				<li><a href="index.php">HOME</a></li>
    				<li><a href="about.php">ABOUT</a></li>
    				<li class="current"><a href="services.php">SERVICES</a></li>
    			</ul>
    		</nav>
    	</div>
    </header>
    <section id="newsletter">
    	<div class="container">
    		<h1>Subscribe to Our Newsletter</h1>
    		<form>
    			<input type="email" placeholder="Enter Email...">
    			<button type="submit" class="button_1">Subscribe</button>
    		</form>
    	</div>
    </section>
    <section id="main">
        <div class="container">
            <article id="main-col">
                <h1 class="page-title">Services</h1>
                <ul id="services">
                    <li>
                        <h3>Website Design</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies at, vulpitate id lorem. Nulla facilisi.</p>
                        <p>Pricing: $1,000 - $3,000</p>
                    </li>
                    <li>
                        <h3>Website Maintenance</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies at, vulpitate id lorem. Nulla facilisi.</p>
                        <p>Pricing: $250 per month</p>
                    </li>
                    <li>
                        <h3>Website Hosting</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies at, vulpitate id lorem. Nulla facilisi.</p>
                        <p>Pricing: $25 per month</p>
                    </li>
                </ul>
            </article>
            <aside id="sidebar">
                <div class="dark">
                    <h3>Get A Quote</h3>
                    <form class="quote">
                     <div>
                         <label>Name</label><br/>
                         <input type="text" placeholder="Name">
                     </div>
                     <div>
                         <label>Email</label><br/>
                         <input type="text" placeholder="Email Address">
                     </div>
                     <div>
                         <label>Message</label><br/>
                         <textarea placeholder="Message"></textarea>
                         <button class="button_1" type="submit">Send</button>
                     </div> 
                  </form>
                </div>
            </aside>
        </div>
    </section>
    <footer>
    	<p>Acme Web Design, Copyright &copy; 2020</p>
    </footer>
</body>
</html>