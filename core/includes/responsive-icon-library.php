<?php
/**
 * Responsive SVG Icon Library.
 * This file serves as a centralized repository for SVG icons.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Retrieves an SVG icon by its name from a predefined set of icons.
 *
 * This function returns the SVG markup for the requested icon name.
 * It is useful for centralizing and reusing icons across your theme or plugin.
 *
 * @param string $icon_name The name of the icon to retrieve (e.g., 'facebook', 'youtube').
 * 
 * @return string The SVG markup of the requested icon if found, or an empty string if not found.
 * 
 * @example
 * // Example usage:
 * echo get_svg_icon('facebook'); // Outputs the 'facebook' icon's SVG markup.
 */
function responsive_get_svg_icon($icon_name) {
  $icons = array(
    'twitter' => '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28" > <path d="M25.312 6.375a10.85 10.85 0 01-2.531 2.609c.016.219.016.438.016.656 0 6.672-5.078 14.359-14.359 14.359-2.859 0-5.516-.828-7.75-2.266.406.047.797.063 1.219.063 2.359 0 4.531-.797 6.266-2.156a5.056 5.056 0 01-4.719-3.5c.313.047.625.078.953.078.453 0 .906-.063 1.328-.172a5.048 5.048 0 01-4.047-4.953v-.063a5.093 5.093 0 002.281.641 5.044 5.044 0 01-2.25-4.203c0-.938.25-1.797.688-2.547a14.344 14.344 0 0010.406 5.281 5.708 5.708 0 01-.125-1.156 5.045 5.045 0 015.047-5.047 5.03 5.03 0 013.687 1.594 9.943 9.943 0 003.203-1.219 5.032 5.032 0 01-2.219 2.781c1.016-.109 2-.391 2.906-.781z"></path> </svg>',
    'twitterAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M20.833 5.262a6.685 6.685 0 01-.616.696.997.997 0 00-.278.908c.037.182.06.404.061.634 0 5.256-2.429 8.971-5.81 10.898-2.647 1.509-5.938 1.955-9.222 1.12a12.682 12.682 0 003.593-1.69 1 1 0 00-.156-1.741c-2.774-1.233-4.13-2.931-4.769-4.593-.417-1.084-.546-2.198-.52-3.227.021-.811.138-1.56.278-2.182.394.343.803.706 1.235 1.038a11.59 11.59 0 007.395 2.407c.543-.015.976-.457.976-1V7.519a3.459 3.459 0 011.196-2.674c.725-.631 1.636-.908 2.526-.846s1.753.463 2.384 1.188a1 1 0 001.033.304c.231-.067.463-.143.695-.228zm1.591-3.079a9.884 9.884 0 01-2.287 1.205 5.469 5.469 0 00-3.276-1.385 5.465 5.465 0 00-3.977 1.332A5.464 5.464 0 0011 7.507a9.589 9.589 0 01-5.15-1.97 9.87 9.87 0 01-2.034-2.116 1 1 0 00-1.729.172s-.132.299-.285.76a13.57 13.57 0 00-.357 1.29 13.224 13.224 0 00-.326 2.571c-.031 1.227.12 2.612.652 3.996.683 1.775 1.966 3.478 4.147 4.823A10.505 10.505 0 011.045 18a1 1 0 00-.53 1.873c4.905 2.725 10.426 2.678 14.666.261C19.221 17.833 22 13.434 22 7.5a5.565 5.565 0 00-.023-.489 8.626 8.626 0 001.996-3.781 1 1 0 00-1.55-1.047z"></path> </svg>',
    'twitterAlt2' => '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="24" viewBox="0 0 23 24" > <path d="M13.969 10.157L22.707 0h-2.071l-7.587 8.819L6.989 0H0l9.164 13.336L0 23.987h2.071l8.012-9.313 6.4 9.313h6.989l-9.503-13.831zm-2.836 3.297L2.817 1.559h3.181L20.638 22.5h-3.181l-6.324-9.046z" ></path> </svg>',
    'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" > <path d="M31.997 15.999C31.997 7.163 24.834 0 15.998 0S-.001 7.163-.001 15.999c0 7.985 5.851 14.604 13.499 15.804v-11.18H9.436v-4.625h4.062v-3.525c0-4.01 2.389-6.225 6.043-6.225 1.75 0 3.581.313 3.581.313v3.937h-2.017c-1.987 0-2.607 1.233-2.607 2.498v3.001h4.437l-.709 4.625h-3.728v11.18c7.649-1.2 13.499-7.819 13.499-15.804z" ></path> </svg>',
    'facebookAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M17 3v2h-2c-.552 0-1.053.225-1.414.586S13 6.448 13 7v3a1 1 0 001 1h2.719l-.5 2H14a1 1 0 00-1 1v7h-2v-7a1 1 0 00-1-1H8v-2h2a1 1 0 001-1V7c0-1.105.447-2.103 1.172-2.828S13.895 3 15 3zm1-2h-3c-1.657 0-3.158.673-4.243 1.757S9 5.343 9 7v2H7a1 1 0 00-1 1v4a1 1 0 001 1h2v7a1 1 0 001 1h4a1 1 0 001-1v-7h2c.466 0 .858-.319.97-.757l1-4A1 1 0 0018 9h-3V7h3a1 1 0 001-1V2a1 1 0 00-1-1z"></path> </svg>',
    'facebookAlt2' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="28" viewBox="0 0 16 28" > <path d="M14.984.187v4.125h-2.453c-1.922 0-2.281.922-2.281 2.25v2.953h4.578l-.609 4.625H10.25v11.859H5.469V14.14H1.485V9.515h3.984V6.109C5.469 2.156 7.891 0 11.422 0c1.687 0 3.141.125 3.563.187z"></path> </svg>',
    'behance' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="28" viewBox="0 0 32 28" > <path d="M28.875 5.297h-7.984v1.937h7.984V5.297zm-3.937 6.656c-1.875 0-3.125 1.172-3.25 3.047h6.375c-.172-1.891-1.156-3.047-3.125-3.047zm.25 9.141c1.188 0 2.719-.641 3.094-1.859h3.453c-1.062 3.266-3.266 4.797-6.672 4.797-4.5 0-7.297-3.047-7.297-7.484 0-4.281 2.953-7.547 7.297-7.547 4.469 0 6.937 3.516 6.937 7.734 0 .25-.016.5-.031.734H21.688c0 2.281 1.203 3.625 3.5 3.625zm-20.86-.782h4.625c1.766 0 3.203-.625 3.203-2.609 0-2.016-1.203-2.812-3.109-2.812H4.328v5.422zm0-8.39h4.391c1.547 0 2.641-.672 2.641-2.344 0-1.813-1.406-2.25-2.969-2.25H4.329v4.594zM0 3.969h9.281c3.375 0 6.297.953 6.297 4.875 0 1.984-.922 3.266-2.688 4.109 2.422.688 3.594 2.516 3.594 4.984 0 4-3.359 5.719-6.937 5.719H0V3.968z"></path> </svg>',
    'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" > <path d="M3.703 22.094h3.609V11.25H3.703v10.844zM7.547 7.906c-.016-1.062-.781-1.875-2.016-1.875s-2.047.812-2.047 1.875c0 1.031.781 1.875 2 1.875H5.5c1.266 0 2.047-.844 2.047-1.875zm9.141 14.188h3.609v-6.219c0-3.328-1.781-4.875-4.156-4.875-1.937 0-2.797 1.078-3.266 1.828h.031V11.25H9.297s.047 1.016 0 10.844h3.609v-6.062c0-.313.016-.641.109-.875.266-.641.859-1.313 1.859-1.313 1.297 0 1.813.984 1.813 2.453v5.797zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15C21.984 2 24 4.016 24 6.5z"></path> </svg>',
    'linkedinAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M16 7c-1.933 0-3.684.785-4.95 2.05S9 12.067 9 14v7a1 1 0 001 1h4a1 1 0 001-1v-7c0-.276.111-.525.293-.707S15.724 13 16 13s.525.111.707.293.293.431.293.707v7a1 1 0 001 1h4a1 1 0 001-1v-7c0-1.933-.785-3.684-2.05-4.95S17.933 7 16 7zm0 2c1.381 0 2.63.559 3.536 1.464S21 12.619 21 14v6h-2v-6a2.997 2.997 0 00-5.121-2.121A2.997 2.997 0 0013 14v6h-2v-6c0-1.381.559-2.63 1.464-3.536S14.619 9 16 9zM2 8a1 1 0 00-1 1v12a1 1 0 001 1h4a1 1 0 001-1V9a1 1 0 00-1-1zm1 2h2v10H3zm4-6a2.997 2.997 0 00-5.121-2.121 2.997 2.997 0 000 4.242 2.997 2.997 0 004.242 0A2.997 2.997 0 007 4zM5 4c0 .276-.111.525-.293.707S4.276 5 4 5s-.525-.111-.707-.293S3 4.276 3 4s.111-.525.293-.707S3.724 3 4 3s.525.111.707.293S5 3.724 5 4z"></path> </svg>',
    'youtube' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" > <path d="M11.109 17.625l7.562-3.906-7.562-3.953v7.859zM14 4.156c5.891 0 9.797.281 9.797.281.547.063 1.75.063 2.812 1.188 0 0 .859.844 1.109 2.781.297 2.266.281 4.531.281 4.531v2.125s.016 2.266-.281 4.531c-.25 1.922-1.109 2.781-1.109 2.781-1.062 1.109-2.266 1.109-2.812 1.172 0 0-3.906.297-9.797.297-7.281-.063-9.516-.281-9.516-.281-.625-.109-2.031-.078-3.094-1.188 0 0-.859-.859-1.109-2.781C-.016 17.327 0 15.062 0 15.062v-2.125s-.016-2.266.281-4.531C.531 6.469 1.39 5.625 1.39 5.625 2.452 4.5 3.656 4.5 4.202 4.437c0 0 3.906-.281 9.797-.281z"></path> </svg>',
    'youtubeAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M21.563 6.637c.287 1.529.448 3.295.437 5.125a27.145 27.145 0 01-.437 5.021c-.057.208-.15.403-.272.575a1.743 1.743 0 01-.949.675c-.604.161-2.156.275-3.877.341-2.23.086-4.465.086-4.465.086s-2.235 0-4.465-.085c-1.721-.066-3.273-.179-3.866-.338a1.854 1.854 0 01-.566-.268 1.763 1.763 0 01-.67-.923c-.285-1.526-.444-3.286-.433-5.11-.021-1.54.121-3.292.437-5.06.057-.208.15-.403.272-.575.227-.321.558-.565.949-.675.604-.161 2.156-.275 3.877-.341C9.765 5 12 5 12 5s2.235 0 4.466.078c1.719.06 3.282.163 3.856.303.219.063.421.165.598.299.307.232.538.561.643.958zm1.947-.46a3.762 3.762 0 00-1.383-2.093 3.838 3.838 0 00-1.249-.625c-.898-.22-2.696-.323-4.342-.38C14.269 3 12 3 12 3s-2.272 0-4.541.087c-1.642.063-3.45.175-4.317.407a3.77 3.77 0 00-2.064 1.45 3.863 3.863 0 00-.602 1.339A29.155 29.155 0 000 11.764a29.2 29.2 0 00.477 5.502.878.878 0 00.021.088 3.76 3.76 0 001.451 2.048c.357.252.757.443 1.182.561.879.235 2.686.347 4.328.41 2.269.087 4.541.087 4.541.087s2.272 0 4.541-.087c1.642-.063 3.449-.175 4.317-.407a3.767 3.767 0 002.063-1.45c.27-.381.47-.811.587-1.267.006-.025.012-.05.015-.071.34-1.884.496-3.765.476-5.44a29.214 29.214 0 00-.477-5.504l-.012-.057zm-12.76 7.124v-3.102l2.727 1.551zm-.506 2.588l5.75-3.27a1 1 0 000-1.739l-5.75-3.27a1 1 0 00-1.495.869v6.54a1 1 0 001.494.869z"></path> </svg>',
    'stumbleupon' => '<svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"> <path d="M44 24.8062V30.3542C44 35.2582 40 39.2582 35.096 39.2582C33.926 39.2611 32.7669 39.0327 31.6855 38.5863C30.604 38.1398 29.6214 37.484 28.7942 36.6566C27.9669 35.8292 27.3114 34.8465 26.8651 33.7649C26.4189 32.6833 26.1908 31.5242 26.194 30.3542V24.8722L28.904 26.1622L32.968 25.0022V30.6142C32.968 31.7742 33.87 32.6782 35.032 32.6782C35.3039 32.6814 35.5738 32.6302 35.8256 32.5276C36.0775 32.425 36.3063 32.2731 36.4986 32.0808C36.6909 31.8885 36.8429 31.6597 36.9454 31.4078C37.048 31.156 37.0992 30.8861 37.096 30.6142V24.8722C37.162 24.8062 44 24.8062 44 24.8062ZM28.774 21.4522L32.838 20.2922V17.4522C32.838 12.6122 28.774 8.74219 23.936 8.74219C19.096 8.74219 15.032 12.5482 15.032 17.3882V30.2902C15.032 31.4502 14.13 32.3542 12.968 32.3542C11.808 32.3542 10.904 31.4522 10.904 30.2902V24.8062H4V30.3542C4 35.2582 8 39.2582 12.904 39.2582C17.808 39.2582 21.806 35.3222 21.806 30.4182V17.7122C21.806 16.5522 22.71 15.6482 23.87 15.6482C25.03 15.6482 25.936 16.5502 25.936 17.7122V20.0922L28.774 21.4522Z"></path> </svg>',
    'rss' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" > <path d="M8 20c0-1.109-.891-2-2-2s-2 .891-2 2 .891 2 2 2 2-.891 2-2zm5.484 1.469a9.468 9.468 0 00-8.953-8.953c-.141-.016-.281.047-.375.141S4 12.876 4 13.016v2c0 .266.203.484.469.5 3.203.234 5.781 2.812 6.016 6.016a.498.498 0 00.5.469h2c.141 0 .266-.063.359-.156s.156-.234.141-.375zm6 .015C19.218 13.359 12.64 6.781 4.515 6.515a.38.38 0 00-.359.141.508.508 0 00-.156.359v2c0 .266.219.484.484.5 6.484.234 11.766 5.516 12 12a.51.51 0 00.5.484h2a.509.509 0 00.359-.156.4.4 0 00.141-.359zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15C21.984 2 24 4.016 24 6.5z"></path> </svg>',
    'rssAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M4 12c2.209 0 4.208.894 5.657 2.343S12 17.791 12 20a1 1 0 002 0c0-2.761-1.12-5.263-2.929-7.071S6.761 10 4 10a1 1 0 000 2zm0-7c4.142 0 7.891 1.678 10.607 4.393S19 15.858 19 20a1 1 0 002 0c0-4.694-1.904-8.946-4.979-12.021S8.694 3 4 3a1 1 0 000 2zm3 14c0-.552-.225-1.053-.586-1.414a1.996 1.996 0 00-2.828 0 1.996 1.996 0 000 2.828 1.996 1.996 0 002.828 0C6.775 20.053 7 19.552 7 19z"></path> </svg>',
    'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" > <path d="M21.138.242c3.767.007 3.914.038 4.65.144 1.52.219 2.795.825 3.837 1.821a6.243 6.243 0 011.349 1.848c.442.899.659 1.75.758 3.016.021.271.031 4.592.031 8.916s-.009 8.652-.03 8.924c-.098 1.245-.315 2.104-.743 2.986a6.6 6.6 0 01-4.303 3.522c-.685.177-1.304.26-2.371.31-.381.019-4.361.024-8.342.024s-7.959-.012-8.349-.029c-.921-.044-1.639-.136-2.288-.303a6.64 6.64 0 01-4.303-3.515c-.436-.904-.642-1.731-.751-3.045-.031-.373-.039-2.296-.039-8.87 0-2.215-.002-3.866 0-5.121.006-3.764.037-3.915.144-4.652.219-1.518.825-2.795 1.825-3.833a6.302 6.302 0 011.811-1.326C4.939.603 5.78.391 7.13.278 7.504.247 9.428.24 16.008.24h5.13zm-5.139 4.122c-3.159 0-3.555.014-4.796.07-1.239.057-2.084.253-2.824.541-.765.297-1.415.695-2.061 1.342S5.273 7.613 4.975 8.378c-.288.74-.485 1.586-.541 2.824-.056 1.241-.07 1.638-.07 4.798s.014 3.556.07 4.797c.057 1.239.253 2.084.541 2.824.297.765.695 1.415 1.342 2.061s1.296 1.046 2.061 1.343c.74.288 1.586.484 2.825.541 1.241.056 1.638.07 4.798.07s3.556-.014 4.797-.07c1.239-.057 2.085-.253 2.826-.541.765-.297 1.413-.696 2.06-1.343s1.045-1.296 1.343-2.061c.286-.74.482-1.586.541-2.824.056-1.241.07-1.637.07-4.797s-.015-3.557-.07-4.798c-.058-1.239-.255-2.084-.541-2.824-.298-.765-.696-1.415-1.343-2.061s-1.295-1.045-2.061-1.342c-.742-.288-1.588-.484-2.827-.541-1.241-.056-1.636-.07-4.796-.07zm-1.042 2.097h1.044c3.107 0 3.475.011 4.702.067 1.135.052 1.75.241 2.16.401.543.211.93.463 1.337.87s.659.795.871 1.338c.159.41.349 1.025.401 2.16.056 1.227.068 1.595.068 4.701s-.012 3.474-.068 4.701c-.052 1.135-.241 1.75-.401 2.16-.211.543-.463.93-.871 1.337s-.794.659-1.337.87c-.41.16-1.026.349-2.16.401-1.227.056-1.595.068-4.702.068s-3.475-.012-4.702-.068c-1.135-.052-1.75-.242-2.161-.401-.543-.211-.931-.463-1.338-.87s-.659-.794-.871-1.337c-.159-.41-.349-1.025-.401-2.16-.056-1.227-.067-1.595-.067-4.703s.011-3.474.067-4.701c.052-1.135.241-1.75.401-2.16.211-.543.463-.931.871-1.338s.795-.659 1.338-.871c.41-.16 1.026-.349 2.161-.401 1.073-.048 1.489-.063 3.658-.065v.003zm1.044 3.563a5.977 5.977 0 10.001 11.953 5.977 5.977 0 00-.001-11.953zm0 2.097a3.879 3.879 0 110 7.758 3.879 3.879 0 010-7.758zm6.211-3.728a1.396 1.396 0 100 2.792 1.396 1.396 0 000-2.792v.001z"></path> </svg>',
    'instagramAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M7 1c-1.657 0-3.158.673-4.243 1.757S1 5.343 1 7v10c0 1.657.673 3.158 1.757 4.243S5.343 23 7 23h10c1.657 0 3.158-.673 4.243-1.757S23 18.657 23 17V7c0-1.657-.673-3.158-1.757-4.243S18.657 1 17 1zm0 2h10c1.105 0 2.103.447 2.828 1.172S21 5.895 21 7v10c0 1.105-.447 2.103-1.172 2.828S18.105 21 17 21H7c-1.105 0-2.103-.447-2.828-1.172S3 18.105 3 17V7c0-1.105.447-2.103 1.172-2.828S5.895 3 7 3zm9.989 8.223a5.054 5.054 0 00-1.194-2.567 4.962 4.962 0 00-3.009-1.644 4.904 4.904 0 00-1.477-.002c-1.366.202-2.521.941-3.282 1.967s-1.133 2.347-.93 3.712.941 2.521 1.967 3.282 2.347 1.133 3.712.93 2.521-.941 3.282-1.967 1.133-2.347.93-3.712zm-1.978.294c.122.82-.1 1.609-.558 2.227s-1.15 1.059-1.969 1.18-1.609-.1-2.227-.558-1.059-1.15-1.18-1.969.1-1.609.558-2.227 1.15-1.059 1.969-1.18a2.976 2.976 0 012.688.984c.375.428.63.963.72 1.543zM17.5 7.5a1 1 0 100-2 1 1 0 000 2z"></path> </svg>',
    'pinterest' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" > <path d="M19.5 2C21.984 2 24 4.016 24 6.5v15c0 2.484-2.016 4.5-4.5 4.5H8.172c.516-.734 1.359-2 1.687-3.281 0 0 .141-.531.828-3.266.422.797 1.625 1.484 2.906 1.484 3.813 0 6.406-3.484 6.406-8.141 0-3.516-2.984-6.797-7.516-6.797-5.641 0-8.484 4.047-8.484 7.422 0 2.031.781 3.844 2.438 4.531.266.109.516 0 .594-.297.047-.203.172-.734.234-.953.078-.297.047-.406-.172-.656-.469-.578-.781-1.297-.781-2.344 0-3 2.25-5.672 5.844-5.672 3.187 0 4.937 1.937 4.937 4.547 0 3.422-1.516 6.312-3.766 6.312-1.234 0-2.172-1.031-1.875-2.297.359-1.5 1.047-3.125 1.047-4.203 0-.969-.516-1.781-1.594-1.781-1.266 0-2.281 1.313-2.281 3.063 0 0 0 1.125.375 1.891-1.297 5.5-1.531 6.469-1.531 6.469-.344 1.437-.203 3.109-.109 3.969H4.5A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15z"></path> </svg>',
    'pinterestAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" > <path d="M8 0C3.588 0 0 3.587 0 8s3.587 8 8 8 8-3.588 8-8-3.588-8-8-8zm0 14.931a6.959 6.959 0 01-2.053-.309c.281-.459.706-1.216.862-1.816.084-.325.431-1.647.431-1.647.225.431.888.797 1.587.797 2.091 0 3.597-1.922 3.597-4.313 0-2.291-1.869-4.003-4.272-4.003-2.991 0-4.578 2.009-4.578 4.194 0 1.016.541 2.281 1.406 2.684.131.063.2.034.231-.094.022-.097.141-.566.194-.787a.213.213 0 00-.047-.2c-.287-.347-.516-.988-.516-1.581 0-1.528 1.156-3.009 3.128-3.009 1.703 0 2.894 1.159 2.894 2.819 0 1.875-.947 3.175-2.178 3.175-.681 0-1.191-.563-1.025-1.253.197-.825.575-1.713.575-2.306 0-.531-.284-.975-.878-.975-.697 0-1.253.719-1.253 1.684 0 .612.206 1.028.206 1.028s-.688 2.903-.813 3.444c-.141.6-.084 1.441-.025 1.988a6.922 6.922 0 01-4.406-6.45 6.93 6.93 0 116.931 6.931z"></path> </svg>',
    'yelp' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" > <path d="M12.078 20.609v1.984c-.016 4.406-.016 4.562-.094 4.766-.125.328-.406.547-.797.625-1.125.187-4.641-1.109-5.375-1.984a1.107 1.107 0 01-.266-.562.882.882 0 01.063-.406c.078-.219.219-.391 3.359-4.109 0 0 .016 0 .938-1.094.313-.391.875-.516 1.391-.328.516.203.797.641.781 1.109zM9.75 16.688c-.031.547-.344.953-.812 1.094l-1.875.609c-4.203 1.344-4.344 1.375-4.562 1.375-.344-.016-.656-.219-.844-.562-.125-.25-.219-.672-.266-1.172-.172-1.531.031-3.828.484-4.547.219-.344.531-.516.875-.5.234 0 .422.094 4.953 1.937 0 0-.016.016 1.313.531.469.187.766.672.734 1.234zm12.906 4.64c-.156 1.125-2.484 4.078-3.547 4.5-.359.141-.719.109-.984-.109-.187-.141-.375-.422-2.875-4.484l-.734-1.203c-.281-.438-.234-1 .125-1.437.344-.422.844-.562 1.297-.406 0 0 .016.016 1.859.625 4.203 1.375 4.344 1.422 4.516 1.563.281.219.406.547.344.953zm-10.5-9.875c.078 1.625-.609 1.828-.844 1.906-.219.063-.906.266-1.781-1.109-5.75-9.078-5.906-9.344-5.906-9.344-.078-.328.016-.688.297-.969.859-.891 5.531-2.203 6.75-1.891.391.094.672.344.766.703.063.391.625 8.813.719 10.703zM22.5 13.141c.031.391-.109.719-.406.922-.187.125-.375.187-5.141 1.344-.766.172-1.188.281-1.422.359l.016-.031c-.469.125-1-.094-1.297-.562s-.281-.984 0-1.359c0 0 .016-.016 1.172-1.594 2.562-3.5 2.688-3.672 2.875-3.797.297-.203.656-.203 1.016-.031 1.016.484 3.063 3.531 3.187 4.703v.047z"></path> </svg>',
    'vimeo' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" > <path d="M26.703 8.094c-.109 2.469-1.844 5.859-5.187 10.172C18.047 22.75 15.141 25 12.735 25c-1.484 0-2.734-1.375-3.75-4.109-.688-2.5-1.375-5.016-2.063-7.531-.75-2.734-1.578-4.094-2.453-4.094-.187 0-.844.391-1.984 1.188L1.282 8.923c1.25-1.109 2.484-2.234 3.719-3.313 1.656-1.469 2.922-2.203 3.766-2.281 1.984-.187 3.187 1.156 3.656 4.047.484 3.125.844 5.078 1.031 5.828.578 2.594 1.188 3.891 1.875 3.891.531 0 1.328-.828 2.406-2.516 1.062-1.687 1.625-2.969 1.703-3.844.141-1.453-.422-2.172-1.703-2.172-.609 0-1.234.141-1.891.406 1.25-4.094 3.641-6.078 7.172-5.969 2.609.078 3.844 1.781 3.687 5.094z"></path> </svg>',
    'foursquare' => '<svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"> <path d="M35 15H25M36.636 9L33.363 21M38 4H14V44L24 26H32L38 4Z"></path> </svg>',
    'email' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" > <path d="M15 2H1c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h14c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zM5.831 9.773l-3 2.182a.559.559 0 01-.785-.124.563.563 0 01.124-.786l3-2.182a.563.563 0 01.662.91zm8.124 2.058a.563.563 0 01-.785.124l-3-2.182a.563.563 0 01.662-.91l3 2.182a.563.563 0 01.124.786zm-.124-6.876l-5.5 4a.562.562 0 01-.662 0l-5.5-4a.563.563 0 01.662-.91L8 7.804l5.169-3.759a.563.563 0 01.662.91z"></path> </svg>',
    'emailAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" > <path d="M28 11.094V23.5c0 1.375-1.125 2.5-2.5 2.5h-23A2.507 2.507 0 010 23.5V11.094c.469.516 1 .969 1.578 1.359 2.594 1.766 5.219 3.531 7.766 5.391 1.313.969 2.938 2.156 4.641 2.156h.031c1.703 0 3.328-1.188 4.641-2.156 2.547-1.844 5.172-3.625 7.781-5.391a9.278 9.278 0 001.563-1.359zM28 6.5c0 1.75-1.297 3.328-2.672 4.281-2.438 1.687-4.891 3.375-7.313 5.078-1.016.703-2.734 2.141-4 2.141h-.031c-1.266 0-2.984-1.437-4-2.141-2.422-1.703-4.875-3.391-7.297-5.078-1.109-.75-2.688-2.516-2.688-3.938 0-1.531.828-2.844 2.5-2.844h23c1.359 0 2.5 1.125 2.5 2.5z"></path> </svg>',
    'emailAlt2' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M3 7.921l8.427 5.899c.34.235.795.246 1.147 0L21 7.921V18c0 .272-.11.521-.295.705S20.272 19 20 19H4c-.272 0-.521-.11-.705-.295S3 18.272 3 18zM1 5.983V18c0 .828.34 1.579.88 2.12S3.172 21 4 21h16c.828 0 1.579-.34 2.12-.88S23 18.828 23 18V6.012v-.03a2.995 2.995 0 00-.88-2.102A2.998 2.998 0 0020 3H4c-.828 0-1.579.34-2.12.88A2.995 2.995 0 001 5.983zm19.894-.429L12 11.779 3.106 5.554a.999.999 0 01.188-.259A.994.994 0 014 5h16a1.016 1.016 0 01.893.554z"></path> </svg>',
    'bandcamp' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"> <path d="M0 18.75l7.437-13.5H24l-7.438 13.5H0z"></path> </svg>',
    'behance' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="28" viewBox="0 0 32 28" > <path d="M28.875 5.297h-7.984v1.937h7.984V5.297zm-3.937 6.656c-1.875 0-3.125 1.172-3.25 3.047h6.375c-.172-1.891-1.156-3.047-3.125-3.047zm.25 9.141c1.188 0 2.719-.641 3.094-1.859h3.453c-1.062 3.266-3.266 4.797-6.672 4.797-4.5 0-7.297-3.047-7.297-7.484 0-4.281 2.953-7.547 7.297-7.547 4.469 0 6.937 3.516 6.937 7.734 0 .25-.016.5-.031.734H21.688c0 2.281 1.203 3.625 3.5 3.625zm-20.86-.782h4.625c1.766 0 3.203-.625 3.203-2.609 0-2.016-1.203-2.812-3.109-2.812H4.328v5.422zm0-8.39h4.391c1.547 0 2.641-.672 2.641-2.344 0-1.813-1.406-2.25-2.969-2.25H4.329v4.594zM0 3.969h9.281c3.375 0 6.297.953 6.297 4.875 0 1.984-.922 3.266-2.688 4.109 2.422.688 3.594 2.516 3.594 4.984 0 4-3.359 5.719-6.937 5.719H0V3.968z"></path> </svg>',
    'discord' => '<svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" > <path d="M13.92 13.853c-.76 0-1.36.667-1.36 1.48s.613 1.48 1.36 1.48c.76 0 1.36-.667 1.36-1.48.013-.813-.6-1.48-1.36-1.48zm4.867 0c-.76 0-1.36.667-1.36 1.48s.613 1.48 1.36 1.48c.76 0 1.36-.667 1.36-1.48s-.6-1.48-1.36-1.48z"></path> <path d="M25.267 2.667H7.4a2.74 2.74 0 00-2.733 2.747v18.027A2.74 2.74 0 007.4 26.188h15.12l-.707-2.467 1.707 1.587 1.613 1.493L28 29.334V5.414a2.74 2.74 0 00-2.733-2.747zM20.12 20.08s-.48-.573-.88-1.08c1.747-.493 2.413-1.587 2.413-1.587a7.693 7.693 0 01-1.533.787 8.751 8.751 0 01-1.933.573 9.353 9.353 0 01-3.453-.013 11.26 11.26 0 01-1.96-.573 7.858 7.858 0 01-.973-.453c-.04-.027-.08-.04-.12-.067-.027-.013-.04-.027-.053-.04-.24-.133-.373-.227-.373-.227s.64 1.067 2.333 1.573c-.4.507-.893 1.107-.893 1.107-2.947-.093-4.067-2.027-4.067-2.027 0-4.293 1.92-7.773 1.92-7.773 1.92-1.44 3.747-1.4 3.747-1.4l.133.16c-2.4.693-3.507 1.747-3.507 1.747s.293-.16.787-.387c1.427-.627 2.56-.8 3.027-.84.08-.013.147-.027.227-.027a11.295 11.295 0 012.693-.027c1.267.147 2.627.52 4.013 1.28 0 0-1.053-1-3.32-1.693l.187-.213s1.827-.04 3.747 1.4c0 0 1.92 3.48 1.92 7.773 0 0-1.133 1.933-4.08 2.027z"></path> </svg>',
    'github' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" > <path d="M12 2c6.625 0 12 5.375 12 12 0 5.297-3.437 9.797-8.203 11.391-.609.109-.828-.266-.828-.578 0-.391.016-1.687.016-3.297 0-1.125-.375-1.844-.812-2.219 2.672-.297 5.484-1.313 5.484-5.922 0-1.313-.469-2.375-1.234-3.219.125-.313.531-1.531-.125-3.187-1-.313-3.297 1.234-3.297 1.234a11.28 11.28 0 00-6 0S6.704 6.656 5.704 6.969c-.656 1.656-.25 2.875-.125 3.187-.766.844-1.234 1.906-1.234 3.219 0 4.594 2.797 5.625 5.469 5.922-.344.313-.656.844-.766 1.609-.688.313-2.438.844-3.484-1-.656-1.141-1.844-1.234-1.844-1.234-1.172-.016-.078.734-.078.734.781.359 1.328 1.75 1.328 1.75.703 2.141 4.047 1.422 4.047 1.422 0 1 .016 1.937.016 2.234 0 .313-.219.688-.828.578C3.439 23.796.002 19.296.002 13.999c0-6.625 5.375-12 12-12zM4.547 19.234c.031-.063-.016-.141-.109-.187-.094-.031-.172-.016-.203.031-.031.063.016.141.109.187.078.047.172.031.203-.031zm.484.532c.063-.047.047-.156-.031-.25-.078-.078-.187-.109-.25-.047-.063.047-.047.156.031.25.078.078.187.109.25.047zm.469.703c.078-.063.078-.187 0-.297-.063-.109-.187-.156-.266-.094-.078.047-.078.172 0 .281s.203.156.266.109zm.656.656c.063-.063.031-.203-.063-.297-.109-.109-.25-.125-.313-.047-.078.063-.047.203.063.297.109.109.25.125.313.047zm.891.391c.031-.094-.063-.203-.203-.25-.125-.031-.266.016-.297.109s.063.203.203.234c.125.047.266 0 .297-.094zm.984.078c0-.109-.125-.187-.266-.172-.141 0-.25.078-.25.172 0 .109.109.187.266.172.141 0 .25-.078.25-.172zm.906-.156c-.016-.094-.141-.156-.281-.141-.141.031-.234.125-.219.234.016.094.141.156.281.125s.234-.125.219-.219z"></path> </svg>',
    'githubAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M8.713 18.042c-1.268.38-2.06.335-2.583.17a2.282 2.282 0 01-.614-.302c-.411-.284-.727-.675-1.119-1.172-.356-.451-.85-1.107-1.551-1.476a2.694 2.694 0 00-.604-.232 1 1 0 10-.485 1.941c.074.023.155.06.155.06.252.133.487.404.914.946.366.464.856 1.098 1.553 1.579.332.229.711.426 1.149.564 1.015.321 2.236.296 3.76-.162a1 1 0 10-.575-1.915zM17 22v-3.792a4.377 4.377 0 00-.292-1.942c.777-.171 1.563-.427 2.297-.823 2.083-1.124 3.496-3.242 3.496-6.923a6.408 6.408 0 00-1.379-3.981 6.044 6.044 0 00-.293-3.933 1 1 0 00-.634-.564c-.357-.106-1.732-.309-4.373 1.362a14.24 14.24 0 00-6.646-.002C6.537-.267 5.163-.064 4.806.042a.998.998 0 00-.635.565 6.044 6.044 0 00-.292 3.932A6.414 6.414 0 002.5 8.556c0 3.622 1.389 5.723 3.441 6.859.752.416 1.56.685 2.357.867a4.395 4.395 0 00-.299 1.88L8 22a1 1 0 002 0v-3.87l-.002-.069a2.357 2.357 0 01.661-1.816 1 1 0 00-.595-1.688c-.34-.042-.677-.094-1.006-.159-.79-.156-1.518-.385-2.147-.733-1.305-.723-2.391-2.071-2.41-5.042.013-1.241.419-2.319 1.224-3.165a1 1 0 00.212-1.04 4.045 4.045 0 01-.14-2.392c.491.107 1.354.416 2.647 1.282a1 1 0 00.825.133 12.229 12.229 0 016.47.002.994.994 0 00.818-.135c1.293-.866 2.156-1.175 2.647-1.282a4.041 4.041 0 01-.141 2.392c-.129.352-.058.755.213 1.04a4.419 4.419 0 011.224 3.06c0 3.075-1.114 4.445-2.445 5.163-.623.336-1.343.555-2.123.7-.322.06-.651.106-.983.143a1 1 0 00-.608 1.689 2.36 2.36 0 01.662 1.837l-.003.078V22a1 1 0 002 0z"></path> </svg>',
    'googlereviews' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" > <path d="M12 12.281h11.328c.109.609.187 1.203.187 2C23.515 21.125 18.921 26 11.999 26c-6.641 0-12-5.359-12-12s5.359-12 12-12c3.234 0 5.953 1.188 8.047 3.141L16.78 8.282c-.891-.859-2.453-1.859-4.781-1.859-4.094 0-7.438 3.391-7.438 7.578s3.344 7.578 7.438 7.578c4.75 0 6.531-3.406 6.813-5.172h-6.813v-4.125z"></path> </svg>',
    'medium' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" > <path d="M0 0v32h32V0zm26.584 7.581l-1.716 1.645a.5.5 0 00-.191.486v-.003 12.089a.502.502 0 00.189.481l.001.001 1.676 1.645v.361h-8.429v-.36l1.736-1.687c.171-.171.171-.22.171-.48v-9.773l-4.827 12.26h-.653L8.92 11.986v8.217a1.132 1.132 0 00.311.943l2.259 2.739v.361H5.087v-.36l2.26-2.74a1.09 1.09 0 00.289-.949l.001.007v-9.501a.83.83 0 00-.27-.702L7.366 10 5.358 7.581v-.36h6.232l4.817 10.564L20.642 7.22h5.941z"></path> </svg>',
    'patreon' => '<svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" > <path d="M21.37.033c-6.617 0-12.001 5.383-12.001 11.999 0 6.597 5.383 11.963 12.001 11.963 6.597 0 11.963-5.367 11.963-11.963C33.333 5.415 27.966.033 21.37.033zM.004 31.996h5.859V.033H.004z"></path> </svg>',
    'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="28" viewBox="0 0 12 28" > <path d="M7.25 22c0-.688-.562-1.25-1.25-1.25s-1.25.562-1.25 1.25.562 1.25 1.25 1.25 1.25-.562 1.25-1.25zm3.25-2.5v-11c0-.266-.234-.5-.5-.5H2c-.266 0-.5.234-.5.5v11c0 .266.234.5.5.5h8c.266 0 .5-.234.5-.5zm-3-13.25A.246.246 0 007.25 6h-2.5c-.141 0-.25.109-.25.25s.109.25.25.25h2.5c.141 0 .25-.109.25-.25zM12 6v16c0 1.094-.906 2-2 2H2c-1.094 0-2-.906-2-2V6c0-1.094.906-2 2-2h8c1.094 0 2 .906 2 2z"></path> </svg>',
    'phoneAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M7 1a2.997 2.997 0 00-3 3v16a2.997 2.997 0 003 3h10a2.997 2.997 0 003-3V4a2.997 2.997 0 00-3-3zm0 2h10c.276 0 .525.111.707.293S18 3.724 18 4v16c0 .276-.111.525-.293.707S17.276 21 17 21H7c-.276 0-.525-.111-.707-.293S6 20.276 6 20V4c0-.276.111-.525.293-.707S6.724 3 7 3zm5 16a1 1 0 100-2 1 1 0 000 2z"></path> </svg>',
    'phoneAlt2' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" > <path d="M20 18.641c0-.078 0-.172-.031-.25-.094-.281-2.375-1.437-2.812-1.687-.297-.172-.656-.516-1.016-.516-.688 0-1.703 2.047-2.312 2.047-.313 0-.703-.281-.984-.438-2.063-1.156-3.484-2.578-4.641-4.641-.156-.281-.438-.672-.438-.984 0-.609 2.047-1.625 2.047-2.312 0-.359-.344-.719-.516-1.016-.25-.438-1.406-2.719-1.687-2.812-.078-.031-.172-.031-.25-.031-.406 0-1.203.187-1.578.344-1.031.469-1.781 2.438-1.781 3.516 0 1.047.422 2 .781 2.969 1.25 3.422 4.969 7.141 8.391 8.391.969.359 1.922.781 2.969.781 1.078 0 3.047-.75 3.516-1.781.156-.375.344-1.172.344-1.578zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15C21.984 2 24 4.016 24 6.5z"></path> </svg>',
    'reddit' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" > <path d="M14.672 17.641a.293.293 0 010 .406c-.766.766-2.234.828-2.672.828s-1.906-.063-2.672-.828a.293.293 0 010-.406.267.267 0 01.406 0c.484.484 1.531.656 2.266.656s1.781-.172 2.266-.656a.267.267 0 01.406 0zm-4.109-2.438c0 .656-.547 1.203-1.203 1.203s-1.203-.547-1.203-1.203a1.203 1.203 0 012.406 0zm5.281 0c0 .656-.547 1.203-1.203 1.203s-1.203-.547-1.203-1.203a1.203 1.203 0 012.406 0zm3.359-1.609c0-.875-.719-1.594-1.609-1.594a1.62 1.62 0 00-1.141.484c-1.094-.75-2.562-1.234-4.172-1.281l.844-3.797 2.672.609c.016.656.547 1.188 1.203 1.188S18.203 8.656 18.203 8 17.656 6.797 17 6.797a1.2 1.2 0 00-1.078.672l-2.953-.656c-.156-.047-.297.063-.328.203l-.938 4.188c-1.609.063-3.063.547-4.141 1.297a1.603 1.603 0 00-2.765 1.094c0 .641.375 1.188.906 1.453-.047.234-.078.5-.078.75 0 2.547 2.859 4.609 6.391 4.609s6.406-2.063 6.406-4.609a3.09 3.09 0 00-.094-.766c.516-.266.875-.812.875-1.437zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15C21.984 2 24 4.016 24 6.5z"></path> </svg>',
    'redditAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" > <path d="M4 10a1 1 0 112 0 1 1 0 01-2 0zm6 0a1 1 0 112 0 1 1 0 01-2 0zm.049 2.137a.593.593 0 11.735.933c-.717.565-1.81.93-2.783.93s-2.066-.365-2.784-.93a.593.593 0 11.735-.933c.413.325 1.23.675 2.049.675s1.636-.35 2.049-.675zM16 8a2 2 0 00-3.748-.972c-1.028-.562-2.28-.926-3.645-1.01L9.8 3.338l2.284.659a1.5 1.5 0 10.094-1.209l-2.545-.735a.593.593 0 00-.707.329L7.305 6.023c-1.33.094-2.551.453-3.557 1.004a2 2 0 10-2.555 2.802A3.661 3.661 0 001 10.999c0 2.761 3.134 5 7 5s7-2.239 7-5c0-.403-.067-.795-.193-1.17A2 2 0 0016 7.999zm-2.5-5.062a.563.563 0 110 1.126.563.563 0 010-1.126zM1 8a1 1 0 011.904-.427 5.292 5.292 0 00-1.276 1.355A1.001 1.001 0 011 8zm7 6.813c-3.21 0-5.813-1.707-5.813-3.813S4.789 7.187 8 7.187c3.21 0 5.813 1.707 5.813 3.813S11.211 14.813 8 14.813zm6.372-5.885a5.276 5.276 0 00-1.276-1.355C13.257 7.235 13.601 7 14 7a1.001 1.001 0 01.372 1.928z"></path> </svg>',
    'soundcloud' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" > <path d="M27.874 16.069c-.565 0-1.105.11-1.596.308C25.95 12.803 22.831 10 19.028 10a7.61 7.61 0 00-2.635.474c-.311.116-.393.235-.393.466v12.585c0 .243.195.445.441.469l11.434.007c2.278 0 4.125-1.776 4.125-3.965s-1.848-3.966-4.126-3.966zM12.5 24h1l.5-7.007L13.5 10h-1l-.5 6.993zm-3 0h-1L8 18.914 8.5 14h1l.5 5zm-5 0h1l.5-4-.5-4h-1L4 20zm-4-2h1l.5-2-.5-2h-1L0 20z"></path> </svg>',
    'soundcloudAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" > <path d="M29 0H3C1.35 0 0 1.35 0 3v26c0 1.65 1.35 3 3 3h26c1.65 0 3-1.35 3-3V3c0-1.65-1.35-3-3-3zM5.5 22h-1L4 19l.5-3h1l.5 3-.5 3zm4 0h-1L8 18l.5-4h1l.5 4-.5 4zm4 0h-1l-.5-6 .5-6h1l.5 6-.5 6zm12.288 0l-9.419-.006a.417.417 0 01-.369-.4V10.807c0-.2.069-.3.325-.4a6.003 6.003 0 018.15 5.063 3.404 3.404 0 014.713 3.138 3.398 3.398 0 01-3.4 3.394z"></path> </svg>',
    'spotify' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"> <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"></path> </svg>',
    'telegram' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" > <path d="M26.07 3.996a2.987 2.987 0 00-.952.23l.019-.007h-.004c-.285.113-1.64.683-3.7 1.547l-7.382 3.109c-5.297 2.23-10.504 4.426-10.504 4.426l.062-.024s-.359.118-.734.375c-.234.15-.429.339-.582.56l-.004.007c-.184.27-.332.683-.277 1.11.09.722.558 1.155.894 1.394.34.242.664.355.664.355h.008l4.883 1.645c.219.703 1.488 4.875 1.793 5.836.18.574.355.933.574 1.207.106.14.23.257.379.351.071.042.152.078.238.104l.008.002-.05-.012c.015.004.027.016.038.02.04.011.067.015.118.023.773.234 1.394-.246 1.394-.246l.035-.028 2.883-2.625 4.832 3.707.11.047c1.007.442 2.027.196 2.566-.238.543-.437.754-.996.754-.996l.035-.09 3.734-19.129c.106-.472.133-.914.016-1.343a1.818 1.818 0 00-.774-1.043l-.007-.004a1.852 1.852 0 00-1.071-.269h.005zm-.101 2.05c-.004.063.008.056-.02.177v.011l-3.699 18.93c-.016.027-.043.086-.117.145-.078.062-.14.101-.465-.028l-5.91-4.531-3.57 3.254.75-4.79 9.656-9c.398-.37.265-.448.265-.448.028-.454-.601-.133-.601-.133l-12.176 7.543-.004-.02-5.851-1.972a.237.237 0 00.032-.013l-.002.001.032-.016.031-.011s5.211-2.196 10.508-4.426c2.652-1.117 5.324-2.242 7.379-3.11a807.312 807.312 0 013.66-1.53c.082-.032.043-.032.102-.032z"></path> </svg>',
    'telegramAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" > <path d="M18.578 20.422l2.297-10.828c.203-.953-.344-1.328-.969-1.094l-13.5 5.203c-.922.359-.906.875-.156 1.109l3.453 1.078 8.016-5.047c.375-.25.719-.109.438.141l-6.484 5.859-.25 3.563c.359 0 .516-.156.703-.344l1.687-1.625 3.5 2.578c.641.359 1.094.172 1.266-.594zM28 14c0 7.734-6.266 14-14 14S0 21.734 0 14 6.266 0 14 0s14 6.266 14 14z"></path> </svg>',
    'threads' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512" > <path d="M331.5 235.7c2.2 .9 4.2 1.9 6.3 2.8c29.2 14.1 50.6 35.2 61.8 61.4c15.7 36.5 17.2 95.8-30.3 143.2c-36.2 36.2-80.3 52.5-142.6 53h-.3c-70.2-.5-124.1-24.1-160.4-70.2c-32.3-41-48.9-98.1-49.5-169.6V256v-.2C17 184.3 33.6 127.2 65.9 86.2C102.2 40.1 156.2 16.5 226.4 16h.3c70.3 .5 124.9 24 162.3 69.9c18.4 22.7 32 50 40.6 81.7l-40.4 10.8c-7.1-25.8-17.8-47.8-32.2-65.4c-29.2-35.8-73-54.2-130.5-54.6c-57 .5-100.1 18.8-128.2 54.4C72.1 146.1 58.5 194.3 58 256c.5 61.7 14.1 109.9 40.3 143.3c28 35.6 71.2 53.9 128.2 54.4c51.4-.4 85.4-12.6 113.7-40.9c32.3-32.2 31.7-71.8 21.4-95.9c-6.1-14.2-17.1-26-31.9-34.9c-3.7 26.9-11.8 48.3-24.7 64.8c-17.1 21.8-41.4 33.6-72.7 35.3c-23.6 1.3-46.3-4.4-63.9-16c-20.8-13.8-33-34.8-34.3-59.3c-2.5-48.3 35.7-83 95.2-86.4c21.1-1.2 40.9-.3 59.2 2.8c-2.4-14.8-7.3-26.6-14.6-35.2c-10-11.7-25.6-17.7-46.2-17.8H227c-16.6 0-39 4.6-53.3 26.3l-34.4-23.6c19.2-29.1 50.3-45.1 87.8-45.1h.8c62.6 .4 99.9 39.5 103.7 107.7l-.2 .2zm-156 68.8c1.3 25.1 28.4 36.8 54.6 35.3c25.6-1.4 54.6-11.4 59.5-73.2c-13.2-2.9-27.8-4.4-43.4-4.4c-4.8 0-9.6 .1-14.4 .4c-42.9 2.4-57.2 23.2-56.2 41.8l-.1 .1z"></path> </svg>',
    'tiktok' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" > <path d="M16.707.027C18.454 0 20.187.014 21.92 0c.107 2.04.84 4.12 2.333 5.56 1.493 1.48 3.6 2.16 5.653 2.387v5.373c-1.92-.067-3.853-.467-5.6-1.293-.76-.347-1.467-.787-2.16-1.24-.013 3.893.013 7.787-.027 11.667-.107 1.867-.72 3.72-1.8 5.253-1.747 2.56-4.773 4.227-7.88 4.28-1.907.107-3.813-.413-5.44-1.373-2.693-1.587-4.587-4.493-4.867-7.613a24.42 24.42 0 01-.013-1.987 10.004 10.004 0 013.44-6.613c2.213-1.92 5.307-2.84 8.2-2.293.027 1.973-.053 3.947-.053 5.92-1.32-.427-2.867-.307-4.027.493a4.631 4.631 0 00-1.813 2.333c-.28.68-.2 1.427-.187 2.147.32 2.187 2.427 4.027 4.667 3.827 1.493-.013 2.92-.88 3.693-2.147.253-.44.533-.893.547-1.413.133-2.387.08-4.76.093-7.147.013-5.373-.013-10.733.027-16.093z"></path> </svg>',
    'vk' => '<svg xmlns="http://www.w3.org/2000/svg" width="31" height="28" viewBox="0 0 31 28" > <path d="M29.953 8.125c.234.641-.5 2.141-2.344 4.594-3.031 4.031-3.359 3.656-.859 5.984 2.406 2.234 2.906 3.313 2.984 3.453 0 0 1 1.75-1.109 1.766l-4 .063c-.859.172-2-.609-2-.609-1.5-1.031-2.906-3.703-4-3.359 0 0-1.125.359-1.094 2.766.016.516-.234.797-.234.797s-.281.297-.828.344h-1.797c-3.953.25-7.438-3.391-7.438-3.391S3.421 16.595.078 8.736c-.219-.516.016-.766.016-.766s.234-.297.891-.297l4.281-.031c.406.063.688.281.688.281s.25.172.375.5c.703 1.75 1.609 3.344 1.609 3.344 1.563 3.219 2.625 3.766 3.234 3.437 0 0 .797-.484.625-4.375-.063-1.406-.453-2.047-.453-2.047-.359-.484-1.031-.625-1.328-.672-.234-.031.156-.594.672-.844.766-.375 2.125-.391 3.734-.375 1.266.016 1.625.094 2.109.203 1.484.359.984 1.734.984 5.047 0 1.062-.203 2.547.562 3.031.328.219 1.141.031 3.141-3.375 0 0 .938-1.625 1.672-3.516.125-.344.391-.484.391-.484s.25-.141.594-.094l4.5-.031c1.359-.172 1.578.453 1.578.453z"></path> </svg>',
    'whatsapp' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" > <path d="M15.391 15.219c.266 0 2.812 1.328 2.922 1.516.031.078.031.172.031.234 0 .391-.125.828-.266 1.188-.359.875-1.813 1.437-2.703 1.437-.75 0-2.297-.656-2.969-.969-2.234-1.016-3.625-2.75-4.969-4.734-.594-.875-1.125-1.953-1.109-3.031v-.125c.031-1.031.406-1.766 1.156-2.469.234-.219.484-.344.812-.344.187 0 .375.047.578.047.422 0 .5.125.656.531.109.266.906 2.391.906 2.547 0 .594-1.078 1.266-1.078 1.625 0 .078.031.156.078.234.344.734 1 1.578 1.594 2.141.719.688 1.484 1.141 2.359 1.578a.681.681 0 00.344.109c.469 0 1.25-1.516 1.656-1.516zM12.219 23.5c5.406 0 9.812-4.406 9.812-9.812s-4.406-9.812-9.812-9.812-9.812 4.406-9.812 9.812c0 2.063.656 4.078 1.875 5.75l-1.234 3.641 3.781-1.203a9.875 9.875 0 005.391 1.625zm0-21.594C18.719 1.906 24 7.187 24 13.687s-5.281 11.781-11.781 11.781c-1.984 0-3.953-.5-5.703-1.469L0 26.093l2.125-6.328a11.728 11.728 0 01-1.687-6.078c0-6.5 5.281-11.781 11.781-11.781z"></path> </svg>',
    'wordpress' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" > <path d="M1.984 14c0-1.734.375-3.391 1.047-4.891l5.734 15.703c-4.016-1.953-6.781-6.062-6.781-10.813zm20.125-.609c0 1.031-.422 2.219-.922 3.891l-1.188 4-4.344-12.906s.719-.047 1.375-.125c.641-.078.562-1.031-.078-.984-1.953.141-3.203.156-3.203.156s-1.172-.016-3.156-.156c-.656-.047-.734.938-.078.984.609.063 1.25.125 1.25.125l1.875 5.125-2.625 7.875-4.375-13s.719-.047 1.375-.125c.641-.078.562-1.031-.078-.984-1.937.141-3.203.156-3.203.156-.219 0-.484-.016-.766-.016a11.966 11.966 0 0110.031-5.422c3.125 0 5.969 1.203 8.109 3.156h-.156c-1.172 0-2.016 1.016-2.016 2.125 0 .984.578 1.813 1.188 2.812.469.797.984 1.828.984 3.313zm-7.906 1.656l3.703 10.109a.59.59 0 00.078.172c-1.25.438-2.578.688-3.984.688-1.172 0-2.312-.172-3.391-.5zm10.328-6.813A11.98 11.98 0 0126.015 14c0 4.438-2.406 8.297-5.984 10.375l3.672-10.594c.609-1.75.922-3.094.922-4.312 0-.438-.031-.844-.094-1.234zM14 0c7.719 0 14 6.281 14 14s-6.281 14-14 14S0 21.719 0 14 6.281 0 14 0zm0 27.359c7.359 0 13.359-6 13.359-13.359S21.359.641 14 .641.641 6.641.641 14s6 13.359 13.359 13.359z"></path> </svg>',
  );

  return isset($icons[$icon_name]) ? $icons[$icon_name] : '';
}
?>
