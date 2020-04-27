var zoneid = $('#zoneid').val();
 let rider = "https://loyalty-dot-techloft-173609.appspot.com/api/Riders?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"  
 let riderurl = rider + zoneid + "%22%7D%2C%20%22order%22%20%3A%22id%20DESC%22%7D" 
const zgRef = document.querySelector('zing-grid');
fetch(riderurl)
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));