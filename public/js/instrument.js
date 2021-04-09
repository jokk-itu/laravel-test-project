function postNewInstrument(event)
{
    event.preventDefault();
    const data = $('#instrument-form').serialize();
    $.post('/instrument/create', data, () => {
        console.log('success');
    }).fail(() => {
        console.log('failed')
    });
}

function searchInstrument(event)
{
    event.preventDefault();
    const data = $('#search-instrument')[0].value;
    window.location.href = '/instrument/' + data;
}
