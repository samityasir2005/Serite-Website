let selectedCount = 0;
const form = document.getElementById("myForm");
const submitButton = form.querySelector('button[type="submit"]');
const selectedCountSpan = document.getElementById("selectedCount");

function selectButton(button) {
  if (button.classList.contains("btn-selected")) {
    // Unselect the button
    button.classList.remove("btn-selected");
    selectedCount--;
  } else if (selectedCount < 3) {
    // Select the button
    button.classList.add("btn-selected");
    selectedCount++;
  }

  // Update the selected count display and enable or disable the submit button
  selectedCountSpan.textContent = selectedCount;
  submitButton.disabled = selectedCount === 0;
}


$('.redirect-button').on('change', function(){
    var noChecked = 0;
    $.each($('.redirect-button'), function(){
        if($(this).is(':checked')){
            noChecked++;    
        }
    });
    if(noChecked >= 3){
        $.each($('.redirect-button'), function(){
            if($(this).not(':checked').length == 1){
                $(this).attr('disabled','disabled');    
            }
        });
    }else{
        $('.redirect-button').removeAttr('disabled');    
    };
});