### A Headless Wordpress app with Next.js and GraphQL

Set up to start the app:

- Local Wordpress instance installed via for example [Local](https://localwp.com/)
- WPGraphQL plugin installed in Wordpress
- change local Wordpress installation's corresponding folder to the provided one (*functions.php* file in the "twentytwentytwo" theme folder is the most important one)
- edit *functions.php* file in your theme folder to adjust to any project-specific requirements
- edit/add a *.env* file with local URL to call the [WPgraphQL](https://www.wpgraphql.com/) plugin
- install Next.js by running `npm install` while in the *next_js* folder
- use `npm run dev` to start the development server
- pray for everyting to work

----

Wordpress plugin used - WPgraphQL

.env file created with local dev endpoint

example repo from next.js: https://github.com/Bedkow/next.js-wordpress-example/tree/canary/examples/cms-wordpress

SWR library to ease data fetching - https://swr.vercel.app/
