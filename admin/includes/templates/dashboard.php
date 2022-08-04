<?php
 $Clients = get_From("client.*","client","LIMIT 5");
?>
<div class="dashboard">
	
 <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Clients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            	<?php 
                            	   $count_clients = getCount("client");
                                   echo $count_clients; 
                                ?>
                                	
                            </div>
                        </div>
                        <div class="col-auto">
                           
                           <i class="fa fa-briefcase fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Vehecules</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            	<?php 
                            	   $count_vehecules = getCount("vehecule");
                                   echo $count_vehecules; 
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="icon-help fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reservation
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    	<?php 
                            	            $count_reservations = getCount("reservation");
                                            echo $count_reservations; 
                                        ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Fournisseurs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            	<?php 
                            	    $count_fournisseurs = getCount("fournisseur");
                                    echo $count_fournisseurs; 
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
	
	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les 5 deriniérs Clients</h4>
                 
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>CIN</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      	<?php foreach($Clients as $Client)
                          {
                              ?>
	                        <tr>
	                          <td><?php echo $Client['cin']; ?></td>
	                          <td><?php echo $Client['nom']; ?></td>
	                          <td><?php echo $Client['prenom']; ?></td>
	                         
	                       
	                          
	                        </tr>
                         <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>