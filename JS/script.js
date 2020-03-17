let cityArray = [
  "Nagpur",
  "Mumbai",
  "Jaipur",
  "Mahabaleshwar",
  "Agra",
  "Kolkata",
  "Chennai",
  "Varanasi",
  "Rishikesh",
  "Shillong",
  "Raipur",
  "Panaji",
  "Ranchi",
  "Ahmedabad",
  "Imphal",
  "Tirupati",
  "Bhopal",
  "Thiruvananthapuram",
  "Pune",
  "Surat",
  "Vadodara",
  "Dehradun",
  "Kanpur",
  "Darjeeling",
  "Agartala",
  "Shimla",
  "Gangtok",
  "Jaisalmer"
];
let stateArray = [
  "Maharashtra",
  "Rajasthan",
  "Uttar Pradesh",
  "West Bengal",
  "Tamil Nadu",
  "Uttarakhand",
  "Meghalaya",
  "Chhatisgarh",
  "Goa",
  "Jharkhand",
  "Gujarat",
  "Manipur",
  "Andhra Pradesh",
  "Madhya Pradesh",
  "Kerala",
  "Tripura",
  "Himachal Pradesh",
  "Sikkim",
  "Punjab",
  "Odisha",
  "Meghalaya",
  "Assam",
  "Bihar",
  "Jammu and Kashmir",
  "Karnataka",
  "Arunachal Pradesh"
];
let seasonArray = ["Summer", "Winter"];
let activityArray = [
  "Sightseeing",
  "Boating",
  "Surfing",
  "Trekking",
  "Safari",
  "Scuba Diving",
  "Camping"
];
let cuisineArray = [
  "Saoji Pohe",
  "Vada Pav",
  "Dal Bati Churma",
  "Petha",
  "Pedha",
  "Sandesh",
  "Uttapum",
  "Malpua",
  "Singori",
  "Chow Mein",
  "Mahuwa and Bafauri",
  "Goan Fish Curry",
  "Baigan Ghop & Thekua",
  "Thepla",
  "Soibum Eromba",
  "Pesarattu",
  "Poha Jalebi",
  "Sadya",
  "Puran Poli",
  "Dhokla",
  "Phafda",
  "Phaanu",
  "Revari",
  "Mishti Doi",
  "Mui Borok",
  "Madra",
  "Momos",
  "Mohan Thaal",
  "Seekh Kebabs",
  "Chole Bhature",
  "Shrikhand",
  "Chenna Poda",
  "Baigan Ki Longe",
  "Rasam",
  "Mawa Kachori",
  "Jadoh wiith Rice",
  "Sev",
  "Makki di Roti",
  "Gatte",
  "Litti Choka",
  "Masoor Tenga",
  "Basundi",
  "Idiyappam",
  "Rogan Josh",
  "Bedhai",
  "Mawa Bati",
  "Pandhara Rassa",
  "Pulihora",
  "Bisibele Bath",
  "Apong"
];

// const cityDropdown = document.getElementById("city-dropdown");
const stateDropdown = document.getElementById("state-dropdown");
const seasonDropdown = document.getElementById("season-dropdown");
const cuisineDropdown = document.getElementById("cuisine-dropdown");
const activityDropdown = document.getElementById("activity-dropdown");

const setUpPage = () => {
  // cityArray.sort();
  // let cityOptions = cityArray.map(
  //   city => `<option value=${city}>${city}</option>`
  // );
  // cityOptions = `<option value=${"all"}>All</option>` + cityOptions.join("");
  // cityDropdown.innerHTML = cityOptions;

  stateArray.sort();
  let stateOptions = stateArray.map(
    state => `<option value=${state}>${state}</option>`
  );
  stateOptions = `<option value=${"all"}>All</option>` + stateOptions.join("");
  stateDropdown.innerHTML = stateOptions;

  seasonArray.sort();
  let seasonOptions = seasonArray.map(
    season => `<option value=${season}>${season}</option>`
  );
  seasonOptions =
    `<option value=${"all"}>All</option>` + seasonOptions.join("");
  seasonDropdown.innerHTML = seasonOptions;

  cuisineArray.sort();
  let cuisineOptions = cuisineArray.map(
    cuisine => `<option value=${cuisine}>${cuisine}</option>`
  );
  cuisineOptions =
    `<option value=${"all"}>All</option>` + cuisineOptions.join("");
  cuisineDropdown.innerHTML = cuisineOptions;

  activityArray.sort();
  let activityOptions = activityArray.map(
    activity => `<option value=${activity}>${activity}</option>`
  );
  activityOptions =
    `<option value=${"all"}>All</option>` + activityOptions.join("");
  activityDropdown.innerHTML = activityOptions;
};
