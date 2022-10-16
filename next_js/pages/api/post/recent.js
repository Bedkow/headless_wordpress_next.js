export default async (req, res) => {

	const QUERY_RECENT_POSTS = `
    query RecentPosts {
        posts(where: {orderby: {field: DATE, order: DESC}}, first: 5) {
            edges {
              node {
                title
                slug
                excerpt
              }
            }
          }
        }
`;


	const data = await fetch(process.env.WORDPRESS_LOCAL_API_URL, {
        method: "POST",
		headers: { "Content-Type": "application/json" },
		body: JSON.stringify({
            query: QUERY_RECENT_POSTS
         })
	});

   
	const json = await data.json();


	res.json(json.data);

};