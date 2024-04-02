import { createClient } from "@supabase/supabase-js";
import OpenAi from "openai";
import dotenv from 'dotenv'
import { error } from "console";

dotenv.config();

//initialize supabase client
const SupaURL = process.env.SUPABASE_URL
const SupaKey = process.env.SUPABASE_KEY

const supabaseClient = createClient(SupaURL, SupaKey)

//generate embeddings
const OpenAIKey = process.env.OPENAI_KEY

async function generateEmbeddings(){
    const openai = new OpenAi({
        apiKey: OpenAIKey
    })

    const documents = [
        // "Jacob is on the brink of graduating from the Web Development program at Nova Scotia Community College, which he started in September 2022. His education is ongoing and includes courses such as Logic and Programming, Website Development, and Introduction to Object-Oriented Programming. Before NSCC Jacob was a store manager at American Eagle Outfitters. While Jacob is in school, he's been working at TD Canada Trust as a Teller",
        // "Jacob has extensive experience in retail management. From February 2020 to September 2022, he worked as a Store Manager at American Eagle Outfitters, overseeing all aspects of store operations and driving the store's performance. Before that, from July 2019 to March 2020, he was an Assistant Store Manager at the same company, where he was responsible for upholding the standards of operation and leading the sales staff.",
        // "Jacob is known for his strong leadership and team management skills. He focuses on coaching and leadership of all staff, aiming to drive store KPIs and improve performance. His work experience suggests that he sets a high standard for management and customer service excellence.",
        // "Jacob has a strong understanding of programming in web development languages, including Java, JavaScript, HTML, and CSS. He also knows PHP, Java, C#, and a bit of Python, which are essential skills in web development.",
        // "Jacob is described as having excellent communication and interpersonal skills. These attributes have likely contributed to his ability to lead teams effectively and drive sales, while also improving customer satisfaction in his roles.",
        // "Jacob loves the colour purple",
        // "Yes, Jacob is proficient in several programming languages. He has a strong understanding of Java, JavaScript, HTML, and CSS, and he is also knowledgeable in PHP, Java, C#, and Python.",
        // "Jacob's commitment to excellence and his proactive approach to exceeding his job description sets him apart. He is determined to succeed and sees change as an opportunity for learning, which is reflected in his hands-on leadership style and ability to significantly influence store performance and management quality.",
        // "You can Contact Jacob by email at jacob.dixon@live.com, by phone at (902) 222-9322, or by filling out the contact page of his portfolio",
        // "Jacob started at American Eagle as a baseline sales associate in August 2017. He was promoted to junior sales manager in July 2018, then to assistant store manager in July 2019, and finally to store manager in February 2020, holding that position until September 2022.",
        // "The Localization Project was an initiative by American Eagle to integrate the store with the local community. As the store manager, Jacob led this project by collaborating with an influencer for content creation, managing the store's Instagram page, organizing charity events, and maintaining an on-brand approach throughout. This project involved engaging with the community and innovating in content delivery and event organization, resulting in significant growth in online following and event turnout.",
        // "Under Jacob's leadership at American Eagle, the various localization projects saw great successes. For instance, their biggest event was with Feed Nova Scotia, where they had about 30 volunteers and donated $5,000 won from an internal competition. Jacob also initiated sponsoring local families during holidays and collaborated with local schools for events, establishing a partnership with three schools for biannual events.",
        // "Jacob applied his marketing and branding knowledge from his photography business to the store manager role at American Eagle. He focused on creating a positive brand image through content creation, customer engagement, and sponsorship of local events, all while innovating and learning from real-world outcomes.",
        // "while at American Eagle Jacob showcased his management effectiveness through documented KPI improvements, positive staff feedback from anonymous surveys, customer reviews with high ratings and visual merchandising successes. His ability to consistently go above and beyond was also evident in his support for colleagues across other stores.",
        // "While Jacob was at American Eagle, the store's Google reviews climbed from 3.9 to 4.4",
        // "Jacob is from Halifax Nova Scotia, and has always lived there",
        // "Jacob is Currently working at TD Canada Trust as a bank teller. He started in September 2022",
        // "Through multiple promotions at American Eagle requiring interviews, Jacob honed his interview skills. This includes effective communication, presenting oneself confidently, and responding to a variety of questions. He has also gained experience on both sides of the interview table, as an interviewee and later as a manager conducting interviews, which gives him a comprehensive understanding of the interview process.",
        // "As a Store Manager at American Eagle, Jacob implemented a strategy to diversify hiring practices and foster an inclusive workplace environment. He was responsible for promoting inclusivity, ensuring fair and equitable treatment of staff, and extending this commitment to community engagement through various projects and charitable initiatives.",
        // "while at American Eagle, Jacob's interest in inclusion and diversity was sparked by a personal encounter with a customer speaking a language he didn't understand, highlighting a service gap. This led him to broaden recruitment focus and pursue a deeper understanding of inclusion and diversity as core elements of business strategy.",
        // "Jacob's experience with inclusion and diversity at American Eagle has given him adaptable, ethical, and collaborative skills, which are essential in the IT industry. His ability to manage change, innovate, understand various perspectives, and tackle ethical challenges is crucial for collaborative IT projects and managing diverse tech teams.",
        // "Jacob is currently working as a Customer Experience Associate at TD Canada Trust since September 2022. In this role, he specializes in providing personalized banking guidance, particularly to those navigating the digital banking landscape. His main responsibilities include explaining complex banking tools in simple terms, developing strong interpersonal skills, and deepening his understanding of the financial system to assist customers more effectively.",
        // "Jacob has several notable achievements at TD Canada Trust. He has demonstrated compliance excellence by ensuring all transactions meet regulatory standards. His proficiency in cash handling has ensured accuracy and security in financial transactions. Furthermore, he has received excellent customer reviews for his exceptional service and has been effective in advising customers on banking products, as evidenced by his achievements in line scorecard metrics.",
        // "While at TD, Jacob's role has significantly contributed to the development of his interpersonal skills and his financial acumen. He has gained confidence in managing finances both for himself and for others. He also prides himself in making the banking experience more approachable and less intimidating for his customers.",
        // "While at TD, Jacob has received glowing customer reviews that emphasize his exceptional service. Customers have particularly appreciated his personalized guidance and his ability to provide clear and understandable explanations of digital banking tools.",
        // "While at TD, Jacob assists customers by applying his deepened understanding of the financial system to advise them on their banking needs and options. He ensures that customers are informed about the various banking products available and helps them make decisions that best suit their financial situations.",
        // "Jacob has a diverse range of hobbies that include photography, cooking, coding, and running. Each of these activities reflects a different aspect of his interests and skills, from artistic expression and technical proficiency to teamwork and personal fitness.",
        // "When Jacob has the time for his hobbies, he enjoyes capturing moments and expressing his creativity through the lens of a camera. He enjoys experimenting with different styles and techniques and often uses his photography skills to document his experiences and travels.",
        // "Gaming is one of Jacob's favourite ways to unwind. He enjoys playing a variety of video games, ranging from strategy and adventure games to competitive sports and action games. Gaming allows him to challenge his reflexes, puzzle-solving abilities, and strategic thinking.",
        // "Coding is not just a professional interest for Jacob; it's also a hobby. He enjoys building personal projects, learning new programming languages, and staying up to date with the latest technology trends. Coding challenges him to think logically and creatively solve problems.",
        // "Running is Jacob's go-to activity for fitness and clearing his mind. He values the discipline and endurance it builds and uses the time while running to reflect or plan for other aspects of his life. Jacob also enjoys hiking when he has the time. ",
        // "Jacob is currently a student at NSCC (Nova Scotia Community College), he Graduates In June 2024 after he either finds a job or finishes a work term. His classes end in April 2024",
        // "Jacob is done classes at NSCC and ready to work starting in April 2024",
        // "Jacobs's Main goal is to get a job in software development",
        // "Jacobs's passion is software development",
        // "Jacob is actively looking for a job in software development",
        // "Jacob is currently a bank teller, which is a base-level position.",
        // "Jacob's pronouns are he/him/his",
        // "NSCC stands for Nova Scotia Community College.",
        // "Let me introduce you to Jacob: a diligent individual with a background in retail management. He began his career at American Eagle Outfitters (AEO) in 2017 and was promoted to store manager in 2020, a position he held until his departure in September 2022. Throughout his tenure, Jacob acquired a diverse skill set encompassing teamwork, people management, flexibility, and adaptability. Subsequently, he embarked on an IT web programming diploma at NSCC in September 2022, which is nearing completion in April 2024, prompting his active job search. With a solid understanding of JavaScript, PHP, HTML, CSS, Java, and C#, complemented by a self-directed journey into Python, Jacob aspires to secure a role as a software or web developer.",
        // "Jacob likes cooking various types of foods, he enjoys discovering new recipes and adding his favourites to his own catalog",
    ]
    
    for(const document of documents){
        const input = document.replace(/\n/g, '');

        const embeddingResponse = await openai.embeddings.create({
            model: "text-embedding-ada-002",
            input
        });

        const [{ embedding }] = embeddingResponse.data;

        await supabaseClient.from('documents').insert({
            content: document,
            embedding
        });
    }
}

//only run this when you need to make the data again, as it will insert into the database duplicate data
generateEmbeddings();
 
//installed npm install supabase --save-dev
//building an edge function, which is essentially just an api endpoint.

//this is for testing purposes, First open a new terminal and run npx supabase functions serve (might need to npx supabase login first)
//then back in the original terminal run node server.js
// async function askQuestion(){
//     const {data, error} = await supabaseClient.functions.invoke('ask-custom-data', {
//         body: JSON.stringify({query: "Tell me about Jacob"})
//     });
//     console.log(error);
//     console.log(data);
// }
// askQuestion();