function filmsList() {
  let films = {
    johnWick: {
      id: 1,
      title: "John Wick",
      date: "December 11, 2014",
      actors: [
        "Keanu Reeves",
        "Ian McShane",
        "Lance Reddick",
        "Derek Kolstad",
        "Bridget Moynahan",
      ],
      description: `With the untimely death of his beloved wife still bitter in his mouth, John Wick, the expert former assassin, 
      receives one final gift from her--a precious keepsake to help John find a new meaning in life now that she is gone. But when 
      the arrogant Russian mob prince, Iosef Tarasov, and his men pay Wick a rather unwelcome visit to rob him of his prized 1969 
      Mustang and his wife's present, the legendary hitman will be forced to unearth his meticulously concealed identity. Blind with 
      revenge, John will immediately unleash a carefully orchestrated maelstrom of destruction against the sophisticated kingpin, Viggo 
      Tarasov, and his family, who are fully aware of his lethal capacity. Now, only blood can quench the boogeyman's thirst for 
      retribution.`,
      poster: "assets/images/john-wick.jpg",
    },
    endgame: {
      id: 2,
      title: "Avengers: Endgame",
      date: "April 22, 2019",
      actors: [
        "Robert Downey Jr.",
        "Chris Evans",
        "Ian McShane",
        "Chris Hemsworth",
        "Scarlett Johansson",
      ],
      description: `After half of all life is snapped away by Thanos, the Avengers are
      left scattered and divided. Now with a way to reverse the damage,
      the Avengers and their allies must assemble once more and learn to
      put differences aside in order to work together and set things
      right. Along the way, the Avengers realize that sacrifices must be
      made as they prepare for the ultimate final showdown with Thanos,
      which will result in the heroes fighting the biggest battle they
      have ever faced.`,
      poster: "assets/images/endgame.jpg",
    },
    inception: {
      id: 3,
      title: "Inception",
      date: "July 22, 2010",
      actors: [
        "Leonardo DiCaprio",
        "Joseph Gordon-Levitt",
        "Tom Hardy",
        "Cillian Murphy",
        "Marion Cotillard",
      ],
      description: `Dominic Cobb is an spy who instead of breaking into a person's home, office, or even computer, gets the information 
      he needs by getting into the person's mind through their dreams. Cobb is also a fugitive who misses his children. Someone 
      approaches Cobb and wants to hire him but instead of getting information out, the man wants Cobb to implant something, a process 
      called "inception", which is not easy to do. Cobb is hesitant to do it, but when the man offers to help Cobb go back to his 
      children, Cobb agrees. So he assembles his team but when they begin, there are things Cobb didn't tell his team that could 
      jeopardize the job, and when they occur, they're not sure if they should continue.`,
      poster: "assets/images/inception.jpg",
    }
  };
  let film_name = document.getElementsByClassName("name");
  let description_container = document.getElementsByClassName("description_container")[0];
  for (let name of film_name) {
    name.addEventListener("click", () => {
      for (let attribute of film_name) {
        attribute.removeAttribute("id");
      }
      name.setAttribute("id", "active");
      let id = name.getAttribute("data-id");
      for (film in films) {
        let film_id = films[film].id;
        if (film_id == id) {
          description_container.innerHTML = `
            <div class="text">
              <div class="title">${films[film].title}</div>
              <div class="date">${films[film].date}</div>
              <div class="actors">
              <div class="actors">
              <div class="actor">${films[film].actors[0]}</div>
              <div class="actor">${films[film].actors[1]}</div>
              <div class="actor">${films[film].actors[2]}</div>
              <div class="actor">${films[film].actors[3]}</div>
              <div class="actor">${films[film].actors[4]}</div>
            </div>
              </div>
              <div class="description">${films[film].description}
              </div>
            </div>
            <img src="${films[film].poster}" alt="poster" class="poster">`;
        }
      }
    });
  }
}

filmsList();
