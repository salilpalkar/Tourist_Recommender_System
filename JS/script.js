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

// const cityDropdown = document.getElementById("city-dropdown");
const stateDropdown = document.getElementById("state-dropdown");
const seasonDropdown = document.getElementById("season-dropdown");

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
};
