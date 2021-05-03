function postNewInstrument(event)
{
    event.preventDefault();
    const data = $('#instrument-form').serialize();
    console.log('Data sent: ' + data);
    $.post('/instrument/create', data, () => {
        console.log('success');
    }).fail((XMLHttpRequest, textStatus, errorThrown) => {
        console.log(XMLHttpRequest.responseText);
        console.log(textStatus);
        console.log(errorThrown);
    });
}

function searchInstrument(event)
{
    event.preventDefault();
    const data = $('#search-instrument')[0].value;
    window.location.href = '/instrument/' + data;
}
