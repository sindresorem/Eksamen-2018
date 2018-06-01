/* kalender */

window.onload=init;

function init()
{
  datePickerController.createDatePicker
  (
    {
      formElements:
        {
          "fradato" : "%Y-%m-%d"
        }
    }
  );
  datePickerController.createDatePicker
  (
    {
      formElements:
        {
          "tildato":"%Y-%m-%d"
        }
    }
  );
}
