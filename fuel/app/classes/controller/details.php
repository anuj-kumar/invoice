<? 
class Controller_Details extends Controller_Template {

function action_add()
{
   $fieldset = Fieldset::forge()->add_model('Model_Neogendetails');
   $form     = $fieldset->form();
 $this->template->title="Add Details";
  $this->template->content = View::forge('details/add', $form);
   
}
}