<?php
	$root = "../../";
	require($root . 'lib/php/functions.php');
	require($root . 'lib/php/header.php');
		?>
            <div class="container"><br />
                <table class="table table-striped table-bordered">
                	
                	<thead>
                    	<tr>
                        	<th>Feature</th>
                        	<th>Normal</th>
                            <th>Premium</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<tr>
                        	<th>Secure Transfer (HTTPS)</th>
                            <th>Yes</th>
                            <th>Yes</th>
                        </tr>
                        <tr>
                        	<th>Adverts</th>
                            <th>Yes</th>
                            <th>No</th>
                       	</tr>
                        <tr>
                        	<th>Waiting Times</th>
                            <th>No</th>
                            <th>No</th>
                        </tr>
                        <tr>
                        	<th>Download Speed</th>
                        	<th>10Mb/s</th>
                            <th>100Mb/s</th>
                        </tr>
                        <tr>
                        	<th>Max Upload Size</th>
                            <th>500Mb</th>
                            <th>~10GB</th>
                        </tr>
                        <tr>
                        	<th>File Organizer</th>
                            <th>No</th>
                            <th>Yes</th>
                        </tr>
                        <tr>
                        	<th><span class="hoverOver" style="border-bottom: 1px black dotted" data-title="Last Chance Download" data-content="If a file gets removed from our service for whatever reason, we provide a 24 hour window for you to download it one last time">Last Chance Download</span></th>
                            <th>No</th>
                            <th>Yes</th>
                        </tr>
                        <tr>
                        	<th>Personal Subdomain</th>
                            <th>No</th>
                            <th>Yes</th>
                        </tr>
                        <tr>
                        	<th>Cost</th>
                            <th>&pound;0.00</th>
                            <th>up to &pound;5.00 p/m</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            
          </body>
            <script>
				$('.dropdown-toggle').dropdown();
				$('.hoverOver').popover();
            </script>
    </body>
</html>