<script lang="ts">

import { onMount } from "svelte";
import { letterSlideIn, maskSlideIn } from "../animations";
import { dataFetch } from "../store"

let footerContainer;
let logoElem, creditsElem, statusElem, fullEmailLinkElem;
let signaturePath1, signaturePath2, signaturePath3, signaturePath4; 

let currentYear = new Date().getFullYear();

onMount(() => {
    introAnimations();
});

async function introAnimations() {
    // Scroll activated animations powered by anime instead of svelte transitions
	const logoAnimate = maskSlideIn(logoElem, {});
    const fullEmailLinkAnimate = letterSlideIn(fullEmailLinkElem, { delay: 6, initDelay: 150 });
    const creditsAnimate = maskSlideIn(creditsElem, { delay: 150 });

    // Intersection observer to run animations when footer is in scroll view
    let animationObserver = new IntersectionObserver((entries) => { 
        entries.forEach(entry => {
            if (entry.isIntersecting) {

				logoAnimate.anime();
                creditsAnimate.anime();
                statusAnimate.anime();
				fullEmailLinkAnimate.anime();

                // Signature SVG animation
                let animation = [{ strokeDashoffset: '0' }];

                // Signature animation using svg strokDashOffset
                signaturePath1.animate(animation, {
                    duration: 2000,
                    delay: 0,
                    easing: 'cubic-bezier(.72,.3,.25,1)',
                    fill: 'forwards' 
                });
                signaturePath2.animate(animation, {
                    duration: 500,
                    delay: 1000,
                    easing: 'cubic-bezier(.47,.41,.26,1)',
                    fill: 'forwards' 
                });
                signaturePath3.animate(animation, {
                    duration: 500,
                    delay: 1300,
                    easing: 'cubic-bezier(.47,.41,.26,1)',
                    fill: 'forwards' 
                });
                signaturePath4.animate(animation, {
                    duration: 2000,
                    delay: 1500,
                    easing: 'cubic-bezier(.47,.41,.26,1)',
                    fill: 'forwards' 
                });

                animationObserver.disconnect();
            }
        });
    }, {
        root: null,
        threshold: 0.4
    });

    animationObserver.observe(footerContainer);

    await dataFetch;
	const statusAnimate = letterSlideIn(statusElem, { delay: 6, initDelay: 100 });
}

</script>



<div class="footer-wrapper" bind:this={footerContainer}>
    <!-- Left side -->
    <div class="flex-wrapper">
        <div class="logo-wrapper">
            <div class="inline-flex" bind:this={logoElem}>
                <img src="assets/imgs/logo.png" alt="mh logo" class="logo">
            </div>
        </div>

        <div class="status-wrapper">
                    <p class="large-text" bind:this={statusElem}>
                        We are currently accepting freelance work, <br>you may reach out via email or <a href="https://calendly.com/flur/30min">here</a>.
                    </p>
            <a class="button large-text" bind:this={fullEmailLinkElem} href="mailto:hello@flur.pro" target="_blank">hello@flur.pro</a>
        </div>
        
        <div class="credits-wrapper" bind:this={creditsElem}>
            <p class="year">© {currentYear}</p>
        </div>
    </div>

    <!-- Right side -->
	<div class="flex-wrapper decor">
        <!-- Musab Hassan SVG Signature -->
        <svg id="signature" class="name-signature" x="0px" y="0px" viewBox="0 0 375 374.999991" style="stroke: rgb(79, 78, 85);">
                <a href="https://calendly.com/flur/30min">
                    <g>
                        <path
                            bind:this={signaturePath1}
                            class="path-1"
                            style="fill:none;stroke:#ffffff;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:miter;stroke-opacity:1;stroke-miterlimit:4;"
                            d="M 374.972656 89.980469 L 361.8125 172.980469 L 345.445312 159.113281 C 314.949219 197.691406 262.652344 242.355469 207.371094 274.441406 C 163.226562 300.0625 117.183594 317.65625 78.820312 317.71875 C 60.375 317.746094 43.46875 312.9375 30.085938 304.992188 C -2.847656 285.4375 -14.457031 246.871094 24.863281 214.566406 C 19.585938 220.214844 4.320312 257.386719 30.085938 273.675781 C 42.304688 281.402344 63.769531 284.421875 99.914062 277.144531 C 104.332031 276.257812 108.738281 275.207031 113.132812 274.003906 C 162.355469 260.550781 209.636719 228.453125 245.675781 198.046875 C 248.84375 195.375 251.921875 192.71875 254.90625 190.089844 C 289.992188 159.175781 312.242188 131.960938 311.453125 130.777344 C 309.769531 128.25 296.832031 118.976562 296.832031 118.976562 L 374.972656 89.980469 "/>
                        <path
                            bind:this={signaturePath2}
                            class="path-2"
                            style="fill:none;stroke:#ffffff;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:miter;stroke-opacity:1;stroke-miterlimit:4;"
                            d="M 374.972656 89.980469 L 361.8125 172.980469 L 345.445312 159.113281 C 314.949219 197.691406 262.652344 242.355469 207.371094 274.441406 C 163.226562 300.0625 117.183594 317.65625 78.820312 317.71875 C 60.375 317.746094 43.46875 312.9375 30.085938 304.992188 C -2.847656 285.4375 -14.457031 246.871094 24.863281 214.566406 C 19.585938 220.214844 4.320312 257.386719 30.085938 273.675781 C 42.304688 281.402344 63.769531 284.421875 99.914062 277.144531 C 104.332031 276.257812 108.738281 275.207031 113.132812 274.003906 C 162.355469 260.550781 209.636719 228.453125 245.675781 198.046875 C 248.84375 195.375 251.921875 192.71875 254.90625 190.089844 C 289.992188 159.175781 312.242188 131.960938 311.453125 130.777344 C 309.769531 128.25 296.832031 118.976562 296.832031 118.976562 L 374.972656 89.980469 "/>
                        <path
                            bind:this={signaturePath3}
                            class="path-3"
                            style="fill:none;stroke:#ffffff;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:miter;stroke-opacity:1;stroke-miterlimit:4;"
                            d="M 374.972656 89.980469 L 361.8125 172.980469 L 345.445312 159.113281 C 314.949219 197.691406 262.652344 242.355469 207.371094 274.441406 C 163.226562 300.0625 117.183594 317.65625 78.820312 317.71875 C 60.375 317.746094 43.46875 312.9375 30.085938 304.992188 C -2.847656 285.4375 -14.457031 246.871094 24.863281 214.566406 C 19.585938 220.214844 4.320312 257.386719 30.085938 273.675781 C 42.304688 281.402344 63.769531 284.421875 99.914062 277.144531 C 104.332031 276.257812 108.738281 275.207031 113.132812 274.003906 C 162.355469 260.550781 209.636719 228.453125 245.675781 198.046875 C 248.84375 195.375 251.921875 192.71875 254.90625 190.089844 C 289.992188 159.175781 312.242188 131.960938 311.453125 130.777344 C 309.769531 128.25 296.832031 118.976562 296.832031 118.976562 L 374.972656 89.980469 "/>
                        <path
                            bind:this={signaturePath4}
                            class="path-4"
                            style="fill:none;stroke:#ffffff;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:miter;stroke-opacity:1;stroke-miterlimit:4;"
                            d="M 374.972656 89.980469 L 361.8125 172.980469 L 345.445312 159.113281 C 314.949219 197.691406 262.652344 242.355469 207.371094 274.441406 C 163.226562 300.0625 117.183594 317.65625 78.820312 317.71875 C 60.375 317.746094 43.46875 312.9375 30.085938 304.992188 C -2.847656 285.4375 -14.457031 246.871094 24.863281 214.566406 C 19.585938 220.214844 4.320312 257.386719 30.085938 273.675781 C 42.304688 281.402344 63.769531 284.421875 99.914062 277.144531 C 104.332031 276.257812 108.738281 275.207031 113.132812 274.003906 C 162.355469 260.550781 209.636719 228.453125 245.675781 198.046875 C 248.84375 195.375 251.921875 192.71875 254.90625 190.089844 C 289.992188 159.175781 312.242188 131.960938 311.453125 130.777344 C 309.769531 128.25 296.832031 118.976562 296.832031 118.976562 L 374.972656 89.980469 "/>
                    </g>
                </a>
        </svg>
    </div>
</div>



<style lang="sass">

@import "../consts.sass"
@include textStyles()

.footer-wrapper
    width: 100vw
    background-color: #131314
    display: flex
    flex-direction: row
    justify-content: space-between
    padding: 15vh 13vw
    margin-top: 25vh
    box-sizing: border-box

    @media only screen and (max-width: 950px)
        .flex-wrapper.decor
            display: none !important

    @media only screen and (max-width: 950px)
        flex-direction: column-reverse

        .flex-wrapper:not(:first-child)
            margin-bottom: 15vh

    .inline-flex
        flex-grow: 1
        display: flex
        flex-direction: row
        align-items: center


    .logo-wrapper
        margin-bottom: 5vh

        .logo
            display: inline-block
            height: 6vh

    .status-wrapper
        .button.large-text
            margin-top: 2vh

    .credits-wrapper
        margin-top: 5vh
        color: rgba(255,255,255,0.3)

        p.year
            margin-bottom: 1vh
            font-family: $font
            font-size: 1.8vh
            font-weight: normal
            color: rgba(255,255,255,0.3)

        .credits
            font-size: 1.5vh
            line-height: 125%
            white-space: nowrap
            color: rgba(255,255,255,0.3)

    .large-text
        font-size: 2.5vh

        @media only screen and (max-width: 950px)
            br
                display: none

    .flex-wrapper.decor
        display: flex
        flex-direction: column
        justify-content: center

        .name-signature
            width: 20vh

#signature
    .path-1
        stroke-dasharray: 365
        stroke-dashoffset: 365
    
    .path-2
        stroke-dasharray: 85
        stroke-dashoffset: 85

    .path-3
        stroke-dasharray: 45
        stroke-dashoffset: 45

    .path-4
        stroke-dasharray: 180
        stroke-dashoffset: 180

</style>