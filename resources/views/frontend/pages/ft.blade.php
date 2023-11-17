 // REquest jobs post
        // RSS feed URL
        // $rssFeedUrl = 'https://ajirayako.co.tz/jobs/feed/';

        // // Initialize cURL session
        // $ch = curl_init($rssFeedUrl);

        // // Set cURL options
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // // Execute the cURL request and store the response
        // $response = curl_exec($ch);

        // // Close the cURL session
        // curl_close($ch);

        // // Check if the request was successful
        // if ($response === false) {
        //     // Handle error
        //     echo 'Error fetching RSS feed.';
        //     // You can also log the error or take other appropriate actions.
        // } else {
        //     // Parse the RSS feed content (you may use a library like SimpleXML)
        //     $rss = simplexml_load_string($response);
        // }

        // // $title = str_replace('-', ' ', $slug);

        // // Iterate through RSS feed items to find the matching item
        // $jobItem = null;
        // foreach ($rss->channel->item as $item) {
        //     $ogSlug = Str::slug($item->title);
        //     if ($ogSlug == $slug) {
        //         $jobItem = $item;
        //         break;
        //     }
        // }

        // // dd($jobItem);

        // if ($jobItem) {
        //     return view('frontend.pages.jobs.details', compact('jobItem', 'rss'));
        // } else {
        //     return abort(404);
        // }