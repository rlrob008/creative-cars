<?php

class Vehicle extends Dbh
{
    public $returnValue;
    public $vehicleModelID = 0;
    public $vehicleModelDescription = "";
    public $vehicleMake = "";
    public $vehicleColour = "";
    public $vehicleCurrentModelId = 0;

    public function getVehicleList()
    {
        $stmtGetVehicles = $this->connect()->prepare("SELECT vehicle_id, fk_vehicle_model_id, vehicle_make, vehicle_color FROM vehicle ORDER BY vehicle_id ASC");
        $stmtGetVehicles->execute();
        
        $this->returnValue = "";
        if($stmtGetVehicles->rowCount()){
            while($rowGetVehicles = $stmtGetVehicles->fetch()){
                $vehicleCurrentModelId = $rowGetVehicles['fk_vehicle_model_id'];
                $stmtGetCurrentModel = $this->connect()->prepare("SELECT vehicle_model_model FROM vehicle_model WHERE vehicle_model_id = ?");
                $stmtGetCurrentModel->execute([$vehicleCurrentModelId]);
                $rowGetCurrentModel = $stmtGetCurrentModel->fetch();
                $this->returnValue = $this->returnValue.'<tr><td>'.$rowGetCurrentModel['vehicle_model_model'].'</td><td>'.$rowGetVehicles['vehicle_make'].'</td><td>'.$rowGetVehicles['vehicle_color'].'</td><td><form action="vehicle.edit.php" method="post" class="mb-2"><input type="hidden" name="vid" id="vid" value="'.$rowGetVehicles['vehicle_id'].'"><input type="submit" class="btn btn-sm btn-warning btn-block" value="Edit"></form> <form action="vehicle.delete.php" method="post"><input type="hidden" name="vid2" id="vid2" value="'.$rowGetVehicles['vehicle_id'].'"><input type="submit" id="deleteVehicle" class="btn btn-sm btn-error btn-block" value="Delete"></form></td></tr>';
            }
        } else {
            $this->returnValue = '<tr><td>No cars loaded.</td><td></td><td></td><td></td></tr>';
        }

        return $this->returnValue;
    }

    public function getCurrentVehicle($vid)
    {
        $stmtGetVehicles = $this->connect()->prepare("SELECT fk_vehicle_model_id FROM vehicle WHERE vehicle_id = ?");
        $stmtGetVehicles->execute([$vid]);
        
        $this->returnValue = "";
        if($stmtGetVehicles->rowCount()){
            while($rowGetVehicles = $stmtGetVehicles->fetch()){
                $vehicleCurrentModelId = $rowGetVehicles['fk_vehicle_model_id'];
                $stmtGetCurrentModel = $this->connect()->prepare("SELECT vehicle_model_model FROM vehicle_model WHERE vehicle_model_id = ?");
                $stmtGetCurrentModel->execute([$vehicleCurrentModelId]);
                $rowGetCurrentModel = $stmtGetCurrentModel->fetch();
                $this->returnValue = $this->returnValue.'<tr><td>'.$rowGetCurrentModel['vehicle_model_model'].'</td><td>'.$rowGetVehicles['vehicle_make'].'</td><td>'.$rowGetVehicles['vehicle_color'].'</td><td><form action="vehicle.edit.php" method="post" class="mb-2"><input type="hidden" name="vid" id="vid" value="'.$rowGetVehicles['vehicle_id'].'"><input type="submit" class="btn btn-sm btn-warning btn-block" value="Edit"></form> <form action="vehicle.delete.php" method="post"><input type="hidden" name="vid2" id="vid2" value="'.$rowGetVehicles['vehicle_id'].'"><input type="submit" id="deleteVehicle" class="btn btn-sm btn-error btn-block" value="Delete"></form></td></tr>';
            }
        } else {
            $this->returnValue = '<tr><td>No cars loaded.</td><td></td><td></td><td></td></tr>';
        }

        return $this->returnValue;
    }

    public function deleteVehicle($vehicleId)
    {
        $stmtDeleteVehicles = $this->connect()->prepare("DELETE FROM vehicle WHERE vehicle_id = ?");
        $stmtDeleteVehicles->execute([$vehicleId]);
        $this->returnValue = "deleted";

        return $this->returnValue;
    }

    public function insertVehicle($vehichleModelId, $vehicleMake, $vehicleColor)
    {
        $stmtInsertVehicles = $this->connect()->prepare("INSERT INTO vehicle (fk_vehicle_model_id, vehicle_make, vehicle_color) VALUES (:vehichleModelId, :vehicleMake, :vehicleColor)");
        $stmtInsertVehicles->bindParam(':vehichleModelId', $vehichleModelId);
        $stmtInsertVehicles->bindParam(':vehicleMake', $vehicleMake);
        $stmtInsertVehicles->bindParam(':vehicleColor', $vehicleColor);
        $stmtInsertVehicles->execute();
        
        $this->returnValue = "Success";

        return $this->returnValue;
    }

    public function getModelList()
    {
        $stmtGetModels = $this->connect()->prepare("SELECT vehicle_model_id, vehicle_model_model FROM vehicle_model ORDER BY vehicle_model_model ASC");
        $stmtGetModels->execute();
        
        $this->returnValue = "";
        if($stmtGetModels->rowCount()){
            while($rowGetModels = $stmtGetModels->fetch()){
                $this->returnValue = $this->returnValue.'<option value="'.$rowGetModels['vehicle_model_id'].'">'.$rowGetModels['vehicle_model_model'].'</option>';
            }
        }

        return $this->returnValue;

    }
}