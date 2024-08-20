const Exporter_reg_Btn = document.querySelector(" .Expoter input"),
CB_reg_Btn = document.querySelector(" .CB input");

Exporter_reg_Btn.onclick = () =>
{
    alert ("You have selected to register as Exporter");
    location.href = "Expoter.php";
};

CB_reg_Btn.onclick = () =>
{
    alert ("You have selected to register as Custom Broker");
    location.href = "CB.php";
};
