$(document).ready(function () {
    $("#formMotorVehicle").submit(function (event) {
        event.preventDefault();
        $("#form-message").html("");
        var vehicleId = $("#vehicle-id").val();
        var vehicleModelId = $("#vehicle-model-id").val();
        var vehicleModel = $("#vehicle-model").val();
        var vehicleMake = $("#vehicle-make").val();
        var vehicleColor = $("#vehicle-colour").val();
        var submit = $("#form-vehicle-submit").val();
        $("#form-message").load("includes/vehicle.add.inc.php", {
            vehicleModel: vehicleModel,
            vehicleMake: vehicleMake,
            vehicleColor: vehicleColor,
            submit: submit,
        }, function(response){
            $("#form-message").html("Saved");
            $("#vehicle-make").val("");
            $("#vehicle-colour").val("");
        });
    });
});