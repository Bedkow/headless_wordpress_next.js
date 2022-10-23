import Head from "next/head";
import useSWR from "swr";
import Link from "next/link";

const fetcher = (...args) => fetch(...args).then((res) => res.json());

const RecentVideos = () => {
	const { data: recentVideos } = useSWR("/api/video/recent", fetcher);

	if (!recentVideos) {
		return "loading...";
	}

	return (
		<>
			{recentVideos.videos.edges.map(({ node }) => (
				<div key={node.slug}>
					<h2>{node.title}</h2>
				</div>
			))}
		</>
	);
};

const RecentPosts = () => {
	const { data: recentPosts } = useSWR("/api/post/recent", fetcher);
	if (!recentPosts) {
		return "loading";
	}

	return (
		<>
			{recentPosts.posts.edges.map(({ node }) => (
				<div key={node.slug}>
					<h3>{node.title}</h3>
					<div dangerouslySetInnerHTML={{ __html: node.excerpt }} />
					<Link href={`post/${node.slug}`}>
						<a>Read more...</a>
					</Link>
				</div>
			))}
		</>
	);
};

export default function Home() {
	const {data: home} = useSWR("/api/page/sample-page", fetcher);

	// if (home.error) return <div>error...</div>;
	if (!home) return <div>loading...</div>;

	return (
		<div>
			<Head>
				<title>Create Next App</title>
				<link rel='icon' href='/favicon.ico' />
				<link
					rel='stylesheet'
					href={`http://headlessnext.local/wp-includes/css/dist/block-library/style.css`}
				/>
			</Head>

			<main>
				<h1>{home.page.title}</h1>
				<div dangerouslySetInnerHTML={{ __html: home.page.content }} />
				<RecentVideos />
        <RecentPosts />
			</main>
		</div>
	);
}
