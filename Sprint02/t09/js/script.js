function getFormattedDate(dateObject) {
  function GetDate(dateObject) {
    let x = dateObject.getDate();
    if (String(x).length == 1) {
      return (x = "0" + x);
    }
    return x;
  }
  function GetMonth(dateObject) {
    let x = dateObject.getMonth();
    if (String(x).length == 1) {
      return (x = "0" + (x + 1));
    }
    return x + 1;
  }
  function GetHours(dateObject) {
    let x = dateObject.getHours();
    if (String(x).length == 1) {
      return (x = "0" + x);
    }
    return x;
  }
  function GetMinutes(dateObject) {
    let x = dateObject.getMinutes();
    if (String(x).length == 1) {
      return (x = "0" + x);
    }
    return x;
  }
  function GetDay(dateObject) {
    let x = dateObject.getDay();
    switch (x) {
      case 0:
        return "Sunday";
      case 1:
        return "Monday";
      case 2:
        return "Tuesday";
      case 3:
        return "Wednesday";
      case 4:
        return "Thursday";
      case 5:
        return "Friday";
      case 6:
        return "Saturday";
      default:
        return "";
    }
  }
  return GetDate(dateObject) + "." + GetMonth(dateObject) + "." + dateObject.getFullYear() + " " + GetHours(dateObject) + ":" + GetMinutes(dateObject) + " " + GetDay(dateObject);
}
