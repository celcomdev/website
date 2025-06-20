<?php
	// Set Meta Tags For SEO
	Yii::app()->name = 'Esteemed Bulk SMS Clients of Celcom Africa';
	Yii::app()->clientScript->registerMetaTag('Celcom Africa is a trusted brand in Kenya that offer Bulk SMS with unique features to SMS clients. Check our happy clients.', 'description');
	Yii::app()->clientScript->registerMetaTag('bulk sms clients in kenya', 'keywords');
	$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'clients'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
        <div class="wpg-hds-inside">
			<h1 class="text-center">Our Clients</h1>
			<p class="lead text-center">Our bulk SMS solution meets your business needs. We have a proven track record of providing impeccable services whilst also offering the cheapest bulk SMS prices in Kenya. Get 50 free bulk SMS messages. Try now!</p>
        </div>
	     <div class="clearfix"> </div>
			 <?php $this->widget('CallbackWidget'); ?>
    </div>
    <?php $this->widget('TestGateway'); ?>
  </div>
</div>

<div class="page-row-grid">
	<div class="container">
		<p class="text-center">Our affordable <b>Bulk SMS Services </b> have help improve customer experience and efficiency for our esteemed clients in various industries ranging from manufacturers, financial institutions, biotech and pharmaceutical companies, real estate developers and managers, technology companies, non-profits, and many other types of companies.  </p>
		<div class="client-list-row">
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
					<img src="images/clients/eveready.jpg" alt="Bulk SMS Clients Kenya" class="img-responsive">
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
					<img src="images/clients/kaa_logo.jpg" alt="Bulk SMS Clients Kenya" class="img-responsive">
				</div>
			</div>

			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
					<img src="images/clients/unicef.jpg" alt="Bulk SMS Clients Kenya" class="img-responsive">
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
					<img src="images/clients/irc.jpg" alt="Bulk SMS Clients Kenya" class="img-responsive">
				</div>
			</div>
		</div>
		<div class="client-list-row">
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
						<img src="images/clients/username.jpg" alt="Bulk SMS Clients Kenya" class="img-responsive">
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
						<img src="images/clients/sbaazar.jpg" alt="Bulk SMS Clients" class="img-responsive">
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
						<img src="images/clients/kise-logo.jpg" alt="Bulk SMS Clients Kenya" class="img-responsive">
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
						<img src="images/clients/rcmrd.jpg" alt="Bulk SMS Clients" class="img-responsive">
				</div>
			</div>
			
				<div class="clearfix"></div>
		</div>
		<div class="client-list-row">
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
					<img src="images/clients/msmu.jpg" alt="Bulk SMS Clients Kenya" class="img-responsive">
				</div>
			</div>
			
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
					<img src="images/clients/heron.jpg" alt="Bulk SMS Clients Kenya" class="img-responsive">
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-3 _clients">
				<div class="client-box">
					<img src="images/clients/uon.jpg" alt="Bulk SMS Clients Kenya" class="img-responsive">
				</div>
			</div>	
			<div class="clearfix"></div>
		</div>

		<p class="text-center"><?php $this->widget('CallBackBody', array('css_id'=>'cahome2')) ?></p>

			<div class="clearfix"></div>
			<h2>Bulk SMS Clients</h2>
			<p>Celom Africa serves a vast array of clients drawn from leading and well-known industrial sectors ranging from entertainment to manufacturers,  wholesale to distributors, NGOs to Religious Organization as well as learning institutions. </p>
			<p>We work with marketing & procurement teams, who are charged with businesss communication, customer relationships, performance, processes and ROI.</p>

			<p> At Celcom Africa, we connect our clients - in all industries - to bulk SMS messaging solution they need to communicate efficiently and effectively.</p>
			<p> Since our inception in 2012, our approach to deliver business value to our clients is our most important responsibility and in the process becoming the most trusted Bulk SMS service provider in Kenya.</p>
			<p>Clients who utilize our bulk SMS services are drawn from; banking and financial services; consulting and professional services; consumer packaged goods; healthcare; insurance; manufacturing; media and entertainment; retail; shipping and logistics; telecommunications; travel and leisure; utilities and energy. </p>
	</div>
</div>
