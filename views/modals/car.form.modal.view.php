<div class="modal fade" id="vehicleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h5 class="modal-title">Motor Vehicle</h5>
				<button type="button" id="form-close-x" class="close form-close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>

            <div class="modal-body">
                <form id="formMotorVehicle" class="form" action="motorvehicle.php" method="POST">
                    <div class="row m-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Model</span>
                            </div>
                            <input type="hidden" id="vehicle-id" class="form-control" value="" required readonly>
                            <input type="hidden" id="vehicle-model-id" class="form-control" value="" required readonly>
                            <select id="vehicle-model" class="form-control">
                                <?php 
                                    $vehicles = new Vehicle;
                                    echo $vehicles->getModelList();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Make</span>
                            </div>
                            <input type="text" id="vehicle-make" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Colour</span>
                            </div>
                            <input type="text" class="form-control" id="vehicle-colour" min="0" max="200" step="0.1">
                        </div>
                    </div>
                </form>
                <p id="form-message-edit"></p>
                <p id="edit-record"></p>
            </div>

            <div class="modal-footer">
                <button type="button" id="form-close" class="btn btn-secondary form-close" data-dismiss="modal">Cancel/Close</button>
                <button type="submit" id="form-reading-submit" name="submit" class="btn btn-primary">Save Reading</button>
            </div>
        </div>
    </div>
</div>