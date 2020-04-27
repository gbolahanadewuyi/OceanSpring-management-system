  // create Calendar from div HTML element
  $("#calendar").kendoCalendar();
  const zgRef = document.querySelector('zing-grid');
fetch(fetchCalls)
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));