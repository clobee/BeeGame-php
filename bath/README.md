Write a PHP program that is responsible for filling a bath. 
You can define any API you like to control the bath. 
Here's a poor quality example - you can do better:

$bath = new Bath();
$bath->openTaps();
sleep(300);
$bath->closeTaps();
echo “Bath is ready!”;

