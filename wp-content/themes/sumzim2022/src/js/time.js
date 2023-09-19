// // Update time every second
// useEffect(() => {
//   const interval = setInterval(() => setTime(Date.now()), 1000);
//   return () => {
//     clearInterval(interval);
//   };
// }, []);

// import { ajaxSettings } from "jquery";

// Get day, hour, minute, and string for output.
import balanceText from "../../node_modules/balance-text/balancetext.js";

const updateStatus = () => {
  // Get local timezone
  const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;

  // Get date object
  const currDate = new Date();

  // Get current time from string
  const currTime = currDate.toLocaleString("en-US", {
    hour: "numeric",
    minute: "numeric",
    hour12: true,
    timeZone: timezone,
  });

  // Get date string from string w/o options for day, pass to date object and get day.
  const dayString = currDate.toLocaleString("en-US", {
    timeZone: timezone,
  });

  const dayDate = new Date(dayString);
  const currDay = dayDate.getDay();

  // Get date string from string w/only timezon for hour, pass to date object and get day.
  const hourString = currDate.toLocaleString("en-US", {
    timeZone: "America/New_York",
  });

  const hourDate = new Date(hourString);
  const currHour = hourDate.getHours();

  // Convert day to string
  const dayToString = (currDay) => {
    let isDay;

    switch (currDay) {
      case 0:
        isDay = "Sunday";
        break;
      case 1:
        isDay = "Monday";
        break;
      case 2:
        isDay = "Tuesday";
        break;
      case 3:
        isDay = "Wednesday";
        break;
      case 4:
        isDay = "Thursday";
        break;
      case 5:
        isDay = "Friday";
        break;
      case 6:
        isDay = "Saturday";
        break;
      default:
        return "test";
    }

    return isDay;
  };

  //   statusDay.innerHTML = dayToString(currDay);

  // Display messsage based on current day and time
  const displayMessage = (currDay, currHour) => {
    const officeClosed = " on-call staff is here to assist you";
    const officeOpen = " office is open";

    if (
      currDay === 1 ||
      currDay === 2 ||
      currDay === 3 ||
      currDay === 4 ||
      currDay === 5
    ) {
      if (currHour >= 7 && currHour < 17) {
        return officeOpen;
      } else {
        return officeClosed;
      }
    } else if (currDay === 6) {
      if (currHour >= 7 && currHour < 12) {
        return officeOpen;
      } else {
        return officeClosed;
      }
    } else {
      return officeClosed;
    }
  };

  const statusAll = document.getElementById("statusAll");
  statusAll.innerHTML = `It's ${dayToString(
    currDay
  )} at ${currTime} <span class="statusBreak">and our ${displayMessage(
    currDay,
    currHour
  )}</span>`;

  let homeHeroHeadline = document.querySelector(".home__heroHeadline");
  balanceText(homeHeroHeadline, { watch: true });
};

setInterval(updateStatus, 1000);
