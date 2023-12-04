document.addEventListener("DOMContentLoaded", () => {
  const memForm = document.getElementById("wpcf7-f28026-o1");

  if (memForm) {
    // const allInputs = document.querySelectorAll('input[type="number"]');

    // allInputs.forEach((el) => {
    //   console.log(el);
    //   el.setAttribute("disabled", "true");
    // });

    function changeQuantity(item, inputName, increaseQty, decreaseQty) {
      increaseQty = (el, num) => {
        el.addEventListener("click", () => {
          // Increase number by 1
          num.stepUp(1);
          console.log("increased");
        });
      };

      decreaseQty = (el, num) => {
        el.addEventListener("click", () => {
          num.stepDown(1);
          console.log('decreased');

          if (num.value < 0) {
            num.value = 0;
          }
        });
      };

      const plus = document.querySelector(`${item} .memtype__qty .plus`);
      const minus = document.querySelector(`${item} .memtype__qty .minus`);

      const input = document.querySelector(
        `.memtype__qty input[name='${inputName}']`
      );

      increaseQty(plus, input);
      decreaseQty(minus, input);
    }

    /** Declare global variables for tracking add/remove from array */
    var count = 0;
    var countNum = 0;
    var monthArray = [];
    var yearArray = [];

    const allMems = document.querySelectorAll(".memtype__each");

    console.log(allMems.length);

    allMems.forEach((el) => {
      /** Change Quantity */

      /** FIX: after && is not working - remove after && and quantity works, keep and addiitonal items don't add to total */
      if (el && el.classList.contains("memtype__additional") == false) {
        changeQuantity(`#${el.id}`, `${el.id}-qty`);
      }

      /** Add up total */
      const getMonthVal = Number(
        el.querySelector("input").parentElement.getAttribute("data-monthly")
      );

      const getYearVal = Number(
        el.querySelector("input").parentElement.getAttribute("data-yearly")
      );

      /** Add additional features */
      // const getAddMonthVal = Number(el.getAttribute("data-monthly"));
      // const getAddYearVal = Number(el.getAttribute("data-yearly"));

      /** Check for .plus or .minus */
      let hasPlus = el.querySelector(".plus") != null;
      let hasMinus = el.querySelector(".minus") != null;
      // let hasAdditional = el.querySelector("input[type='checkbox']") != null;
      let hasCombo = el.classList.contains("memtype__combo");

      /** Get elements that include whole house plumbing */
      let memIncludesWholeHousePlumbing = [
        "tankless-water-heater",
        "water-softener",
        "backflow-preventer",
      ];

      let heatPumpCombos = [
        "heat-pump-oil-furnace-backup",
        "heat-pump-gas-furnace-backup",
        "heat-pump-electric-backup",
      ];

      /** Store values for whole house plumbing removal */
      //   let memIncludesWholeHousePlumbingVals = [];

      let wholeHousePlumbing = el.parentElement.querySelector(
        "#whole-house-plumbing"
      );

      if (el) {
        if (hasPlus) {
          el.querySelector(".plus").addEventListener("click", () => {
            monthArray.push(getMonthVal);
            yearArray.push(getYearVal);

            /** Counter for discount - heat pump combos count for two */
            if (hasCombo && heatPumpCombos.includes(el.id)) {
              count += 2;
            } else if (hasCombo) {
              count += 1;
            }

            // console.log(`Add count is ${count}`);

            if (
              memIncludesWholeHousePlumbing.includes(el.id) &&
              el.querySelector("input").value >= 1
            ) {
              wholeHousePlumbing.classList.add("--mute");

              //   console.log(el.querySelector("input").value);
            }

            if (
              el.id == "whole-house-plumbing" &&
              el.querySelector("input").value >= 1
            ) {
              el.parentElement
                .querySelector("#tankless-water-heater")
                .classList.add("--mute");
              el.parentElement
                .querySelector("#water-softener")
                .classList.add("--mute");
              el.parentElement
                .querySelector("#backflow-preventer")
                .classList.add("--mute");
            }

            const getMonthTotal = monthArray.reduce((a, b) => {
              return a + b;
            });

            const getYearTotal = yearArray.reduce((a, b) => {
              return a + b;
            });

            if (count >= 3) {
              const getMonthDiscountTotal = getMonthTotal - getMonthTotal * 0.1;
              const getYearDiscountTotal = getYearTotal - getYearTotal * 0.1;
              document.getElementById(
                "increment-month"
              ).innerHTML = `$${getMonthDiscountTotal.toFixed(2)}`;
              document.getElementById(
                "increment-year"
              ).innerHTML = `$${getYearDiscountTotal.toFixed(2)}`;

              /* Indicate discount */
              document.getElementById("mem__discount").innerHTML =
                "A 10% discount has been applied to your total";
              document
                .getElementById("mem__discount")
                .classList.add("mem__discount--on");
            } else {
              document.getElementById(
                "increment-month"
              ).innerHTML = `$${getMonthTotal.toFixed(2)}`;
              document.getElementById(
                "increment-year"
              ).innerHTML = `$${getYearTotal.toFixed(2)}`;

              /* Remove discount */
              document.getElementById("mem__discount").innerHTML = "";
              document
                .getElementById("mem__discount")
                .classList.remove("mem__discount--on");
            }
          });
        }

        if (hasMinus) {
          el.querySelector(".minus").addEventListener("click", (e) => {
            if (hasCombo && heatPumpCombos.includes(el.id)) {
              count -= 2;
            } else if (hasCombo) {
              count -= 1;
            }

            if (memIncludesWholeHousePlumbing.includes(el.id)) {
              if (
                el.parentElement
                  .querySelector("#tankless-water-heater")
                  .querySelector("input").value == 0 &&
                el.parentElement
                  .querySelector("#water-softener")
                  .querySelector("input").value == 0 &&
                el.parentElement
                  .querySelector("#backflow-preventer")
                  .querySelector("input").value == 0
              ) {
                wholeHousePlumbing.classList.remove("--mute");
              }
            }

            if (el.id == "whole-house-plumbing") {
              el.parentElement
                .querySelector("#tankless-water-heater")
                .classList.remove("--mute");
              el.parentElement
                .querySelector("#water-softener")
                .classList.remove("--mute");
              el.parentElement
                .querySelector("#backflow-preventer")
                .classList.remove("--mute");
            }

            // console.log(`Minus count is ${count}`);

            const currSelMonthly = monthArray.indexOf(
              Number(e.target.nextElementSibling.getAttribute("data-monthly"))
            );

            const currSelYearly = yearArray.indexOf(
              Number(e.target.nextElementSibling.getAttribute("data-yearly"))
            );

            if (currSelMonthly > -1) {
              monthArray.splice(currSelMonthly, 1);
            }

            if (currSelYearly > -1) {
              yearArray.splice(currSelYearly, 1);
            }

            if (monthArray.length !== 0 && yearArray.length !== 0) {
              const getMonthTotal = monthArray.reduce((a, b) => {
                return a + b;
              });

              const getYearTotal = yearArray.reduce((a, b) => {
                return a + b;
              });

              if (count >= 3) {
                const getMonthDiscountTotal =
                  getMonthTotal - getMonthTotal * 0.1;
                const getYearDiscountTotal = getYearTotal - getYearTotal * 0.1;
                document.getElementById(
                  "increment-month"
                ).innerHTML = `$${getMonthDiscountTotal.toFixed(2)}`;
                document.getElementById(
                  "increment-year"
                ).innerHTML = `$${getYearDiscountTotal.toFixed(2)}`;

                /* Indicate discount */
                document.getElementById("mem__discount").innerHTML =
                  "A 10% discount has been applied to your total";
                document
                  .getElementById("mem__discount")
                  .classList.add("mem__discount--on");
              } else {
                document.getElementById(
                  "increment-month"
                ).innerHTML = `$${getMonthTotal.toFixed(2)}`;
                document.getElementById(
                  "increment-year"
                ).innerHTML = `$${getYearTotal.toFixed(2)}`;

                /* Remove discount */
                document.getElementById("mem__discount").innerHTML = "";
                document
                  .getElementById("mem__discount")
                  .classList.remove("mem__discount--on");
              }
            } else {
              document.getElementById("increment-month").innerHTML = "$0";
              document.getElementById("increment-year").innerHTML = "$0";

              /* Remove discount */
              document.getElementById("mem__discount").innerHTML = "";
              document
                .getElementById("mem__discount")
                .classList.remove("mem__discount--on");
            }
          });
        }
        /** 
        if (hasAdditional) {
          const addCheckboxes = el.querySelectorAll("input[type='checkbox']");

          addCheckboxes.forEach((checks) => {
            checks.addEventListener("change", (e) => {
              if (e.target.checked) {

                monthArray.push(Number(e.target.getAttribute("data-monthly")));
                yearArray.push(Number(e.target.getAttribute("data-yearly")));

                const getMonthTotal = monthArray.reduce((a, b) => {
                  return a + b;
                });

                const getYearTotal = yearArray.reduce((a, b) => {
                  return a + b;
                });

                document.getElementById(
                  "increment-month"
                ).innerHTML = `$${getMonthTotal.toFixed(2)}`;
                document.getElementById(
                  "increment-year"
                ).innerHTML = `$${getYearTotal.toFixed(2)}`;
              } else {

                const currAddSelMonthly = monthArray.indexOf(
                  Number(e.target.getAttribute("data-monthly"))
                );

                const currAddSelYearly = yearArray.indexOf(
                  Number(e.target.getAttribute("data-yearly"))
                );


                if (currAddSelMonthly > -1) {
                  monthArray.splice(currAddSelMonthly, 1);
                }

                if (currAddSelYearly > -1) {
                  yearArray.splice(currAddSelYearly, 1);
                }



                if (monthArray.length !== 0 && yearArray.length !== 0) {
                  const getMonthTotal = monthArray.reduce((a, b) => {
                    return a + b;
                  });

                  const getYearTotal = yearArray.reduce((a, b) => {
                    return a + b;
                  });

                  document.getElementById(
                    "increment-month"
                  ).innerHTML = `$${getMonthTotal.toFixed(2)}`;
                  document.getElementById(
                    "increment-year"
                  ).innerHTML = `$${getYearTotal.toFixed(2)}`;
                } else {
                  document.getElementById("increment-month").innerHTML = "$0";
                  document.getElementById("increment-year").innerHTML = "$0";
                }
              }
            });
          });
        }
         */
      }
    });
  }
});
