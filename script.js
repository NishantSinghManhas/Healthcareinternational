document.addEventListener("mousemove", function (dets) {
  var blur = document.querySelector(".cursor-blur");
  blur.style.left = dets.x - 150 + "px";
  blur.style.top = dets.y - 150 + "px";
});

gsap.from(".page2 .card", {
  y: 90,
  opacity: 0,
  duration: 0.5,
  scrollTrigger: {
    trigger: ".page2 .card",
    scroller: "body",
    start: "top 60%",
    end: "top 40%",
    scrub: 2,
  },
});

gsap.to(".nav", {
  backgroundColor: "rgba(0, 0, 0, 0.87)",
  height: "90px",
  duration: 1,
  scrollTrigger: {
    trigger: ".nav",
    scroller: "body",
    // markers: true,
    start: "top -25%",
    end: "top bottom -20%",
    scrub: 1,
  },
});
gsap.to(".nav h2", {
  color: "white",
  scrollTrigger: {
    trigger: ".nav h2",
    scroller: "body",
    // markers: true,
    start: "top -25%",
    end: "top bottom -20%",
    scrub: 1,
  },
});
gsap.to(".nav-part2 h4", {
  color: "white",
  scrollTrigger: {
    trigger: ".nav-part2 h4",
    scroller: "body",
    // markers: true,
    start: "top -25%",
    end: "top bottom -20%",
    scrub: 1,
  },
});
gsap.to(".nav .ri-user-3-fill", {
  color: "white",
  scrollTrigger: {
    trigger: ".nav .ri-user-3-fill",
    scroller: "body",
    // markers: true,
    start: "top -25%",
    end: "top bottom -20%",
    scrub: 1,
  },
});
gsap.to(".main", {
  backgroundColor: "rgba(0, 0, 0, 0.97)",
  scrollTrigger: {
    trigger: ".main",
    scroller: "body",
    // markers: true,
    start: "top -55%",
    end: "top bottom -100%",
    scrub: 2,
  },
});

gsap.from(".about-us-in, .page4 img", {
  y: 90,
  opacity: 0,
  // duration: 0.5,
  scrollTrigger: {
    trigger: ".about-us-in, .page4 img",
    scroller: "body",
    start: "top 60%",
    end: "top 40%",
    scrub: 2,
  },
});

window.addEventListener("load", () => {
  ScrollTrigger.refresh();
});
