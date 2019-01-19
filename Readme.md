/// Codeigniter 3 With CRUD Generator and Templating System /// <br>
/// HMVC Framework Models //<br>
Modified:<br>

Author: Raessa Fathul Alim<br>
Last Update : 26/06/2015<br>
Thanks To : <br>
- http://code.tutsplus.com/tutorials/an-introduction-to-views-templating-in-codeigniter--net-25648
- http://belajarphp.net
- http://harviacode.com


For Load Template<br>
$view = "Your Aplication View";<br>
$template = "Your Template"<br>
$this->template->load('templates/$template','$view', $data);<br>

Modules Folder<br>

./application/modules/your_folder_name_like_main_controller/controllers/main_controller.php<br>
./application/modules/your_folder_name_like_main_controller/views/Your_Aplication_View.php<br>
./application/modules/your_folder_name_like_main_controller/models/Your_Model.php<br>


For Create CRUD Like Make A Baby :D<br>
http://localhost/your_apps/_crudgenerator<br>
<br>
!!!!  DONT FORGET TO MODIFICATION DATABASE IN YOUR APPS AND _crudgenerator/lib/config.php !!!<br>
Example :<br>
<br>
//configure your database setting here<br>
$hostname = 'localhost';<br>
$username = 'root';<br>
$password = '';<br>
$database = 'dbtest'; //<br>

BIG THANKS FOR YOU!!<br>
Sorry For RIP English :p