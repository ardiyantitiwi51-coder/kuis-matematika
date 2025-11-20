<!doctype html>
<html lang="id">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuis Matematika TK</title>
  <script src="/_sdk/element_sdk.js"></script>
  <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            height: 100%;
            overflow: hidden;
        }
        
        html {
            height: 100%;
        }
        
        .container {
            background: linear-gradient(135deg, #ff6b9d 0%, #c06c84 100%);
            min-height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }
        
        .quiz-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
            max-width: 380px;
            width: 100%;
            text-align: center;
        }
        
        h1 {
            color: #e91e63;
            font-size: 26px;
            margin: 0 0 15px 0;
        }
        
        .progress-indicator {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        .category-badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 15px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 10px;
            color: white;
        }
        
        .category-count {
            background: linear-gradient(135deg, #56ab2f 0%, #a8e063 100%);
        }
        
        .category-add {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .category-subtract {
            background: linear-gradient(135deg, #ff9a56 0%, #ff6a88 100%);
        }
        
        .question {
            font-size: 20px;
            color: #333;
            margin: 15px 0;
            font-weight: bold;
        }
        
        .emoji-display {
            font-size: 32px;
            margin: 12px 0;
            display: flex;
            justify-content: center;
            gap: 6px;
            flex-wrap: wrap;
        }
        
        .options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin: 20px 0;
        }
        
        .option-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-size: 28px;
            color: white;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            font-weight: bold;
        }
        
        .option-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        
        .option-btn.correct {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            animation: celebrate 0.5s ease;
        }
        
        .option-btn.wrong {
            background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);
            animation: shake 0.5s ease;
        }
        
        @keyframes celebrate {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1) rotate(5deg); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        
        .score {
            font-size: 18px;
            color: #e91e63;
            margin: 12px 0;
            font-weight: bold;
        }
        
        .feedback {
            font-size: 40px;
            margin: 12px 0;
            min-height: 50px;
        }
        
        .restart-btn {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            border-radius: 12px;
            padding: 12px 28px;
            font-size: 18px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            margin-top: 12px;
            transition: transform 0.2s;
        }
        
        .restart-btn:hover {
            transform: scale(1.05);
        }
        
        .hidden {
            display: none;
        }
        
        .final-score {
            font-size: 22px;
            color: #333;
            margin: 15px 0;
        }
        
        .stars {
            font-size: 40px;
            margin: 12px 0;
        }
        
        .category-stats {
            background: #f5f5f5;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            text-align: left;
        }
        
        .stat-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 8px 0;
            font-size: 16px;
        }
        
        .stat-label {
            font-weight: bold;
            color: #333;
        }
        
        .stat-value {
            color: #e91e63;
            font-weight: bold;
        }
    </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <div class="container">
   <div class="quiz-card">
    <h1 id="quiz-title">Kuis Matematika TK 🎈</h1>
    <div id="quiz-content">
     <div class="progress-indicator" id="progress-indicator">
      Soal 1/10
     </div>
     <div class="category-badge" id="category-badge">
      Menghitung
     </div>
     <div class="score">
      Skor: <span id="score">0</span>/10
     </div>
     <div class="question" id="question"></div>
     <div class="emoji-display" id="emoji-display"></div>
     <div class="options" id="options"></div>
     <div class="feedback" id="feedback"></div>
    </div>
    <div id="result-content" class="hidden">
     <div class="stars" id="stars"></div>
     <div class="final-score" id="final-score"></div>
     <div class="category-stats" id="category-stats"></div>
     <div class="feedback" id="final-feedback"></div><button class="restart-btn" id="restart-btn">Main Lagi</button>
    </div>
   </div>
  </div>
  <script>
        const defaultConfig = {
            quiz_title: "Kuis Matematika TK 🎈",
            restart_button_text: "Main Lagi"
        };

        const questions = [
            { emoji: "🍎", count: 12, operation: "count", category: "Menghitung" },
            { emoji: "⭐", count: 15, operation: "count", category: "Menghitung" },
            { emoji: "🐟", num1: 7, num2: 5, operation: "add", category: "Penjumlahan" },
            { emoji: "🦋", num1: 8, num2: 6, operation: "add", category: "Penjumlahan" },
            { emoji: "🌸", num1: 13, num2: 7, operation: "subtract", category: "Pengurangan" },
            { emoji: "🎈", num1: 15, num2: 8, operation: "subtract", category: "Pengurangan" },
            { emoji: "🍓", num1: 9, num2: 4, operation: "add", category: "Penjumlahan" },
            { emoji: "🌈", num1: 14, num2: 6, operation: "subtract", category: "Pengurangan" },
            { emoji: "🎨", num1: 11, num2: 5, operation: "add", category: "Penjumlahan" },
            { emoji: "🚀", num1: 16, num2: 9, operation: "subtract", category: "Pengurangan" }
        ];

        let currentQuestion = 0;
        let score = 0;
        let answered = false;
        let categoryScores = {
            "Menghitung": { correct: 0, total: 0 },
            "Penjumlahan": { correct: 0, total: 0 },
            "Pengurangan": { correct: 0, total: 0 }
        };

        function generateOptions(correctAnswer) {
            const options = [correctAnswer];
            while (options.length < 4) {
                const random = Math.max(1, correctAnswer + Math.floor(Math.random() * 8) - 4);
                if (!options.includes(random) && random <= 20) {
                    options.push(random);
                }
            }
            return options.sort(() => Math.random() - 0.5);
        }

        function updateProgressIndicator() {
            const progressEl = document.getElementById('progress-indicator');
            progressEl.textContent = `Soal ${currentQuestion + 1}/${questions.length}`;
        }

        function updateCategoryBadge(category) {
            const badgeEl = document.getElementById('category-badge');
            badgeEl.textContent = category;
            
            // Hapus semua class kategori
            badgeEl.classList.remove('category-count', 'category-add', 'category-subtract');
            
            // Tambah class sesuai kategori
            if (category === "Menghitung") {
                badgeEl.classList.add('category-count');
            } else if (category === "Penjumlahan") {
                badgeEl.classList.add('category-add');
            } else if (category === "Pengurangan") {
                badgeEl.classList.add('category-subtract');
            }
        }

        function displayQuestion() {
            answered = false;
            const q = questions[currentQuestion];
            const questionEl = document.getElementById('question');
            const emojiEl = document.getElementById('emoji-display');
            const optionsEl = document.getElementById('options');
            const feedbackEl = document.getElementById('feedback');
            
            feedbackEl.textContent = '';
            updateProgressIndicator();
            updateCategoryBadge(q.category);
            
            let correctAnswer;
            
            if (q.operation === 'count') {
                questionEl.textContent = `Berapa jumlah ${q.emoji}?`;
                emojiEl.innerHTML = q.emoji.repeat(q.count);
                correctAnswer = q.count;
            } else if (q.operation === 'add') {
                questionEl.textContent = `${q.num1} + ${q.num2} = ?`;
                emojiEl.innerHTML = q.emoji.repeat(q.num1) + ' ➕ ' + q.emoji.repeat(q.num2);
                correctAnswer = q.num1 + q.num2;
            } else if (q.operation === 'subtract') {
                questionEl.textContent = `${q.num1} - ${q.num2} = ?`;
                emojiEl.innerHTML = q.emoji.repeat(q.num1) + ' ➖ ' + q.emoji.repeat(q.num2);
                correctAnswer = q.num1 - q.num2;
            }
            
            const options = generateOptions(correctAnswer);
            optionsEl.innerHTML = '';
            
            options.forEach(option => {
                const btn = document.createElement('button');
                btn.className = 'option-btn';
                btn.textContent = option;
                btn.onclick = () => checkAnswer(option, correctAnswer, btn);
                optionsEl.appendChild(btn);
            });
        }

        function checkAnswer(selected, correct, btn) {
            if (answered) return;
            answered = true;
            
            const q = questions[currentQuestion];
            const feedbackEl = document.getElementById('feedback');
            const allBtns = document.querySelectorAll('.option-btn');
            
            allBtns.forEach(b => b.style.pointerEvents = 'none');
            
            // Update statistik kategori
            categoryScores[q.category].total++;
            
            if (selected === correct) {
                btn.classList.add('correct');
                feedbackEl.textContent = '🎉 Benar!';
                score++;
                categoryScores[q.category].correct++;
                document.getElementById('score').textContent = score;
            } else {
                btn.classList.add('wrong');
                feedbackEl.textContent = '💪 Coba lagi ya!';
                allBtns.forEach(b => {
                    if (parseInt(b.textContent) === correct) {
                        b.classList.add('correct');
                    }
                });
            }
            
            // Otomatis lanjut ke soal berikutnya setelah 1.5 detik
            setTimeout(() => {
                nextQuestion();
            }, 1500);
        }

        function nextQuestion() {
            currentQuestion++;
            if (currentQuestion < questions.length) {
                displayQuestion();
            } else {
                showResults();
            }
        }

        function showResults() {
            document.getElementById('quiz-content').classList.add('hidden');
            document.getElementById('result-content').classList.remove('hidden');
            
            const starsEl = document.getElementById('stars');
            const finalScoreEl = document.getElementById('final-score');
            const finalFeedbackEl = document.getElementById('final-feedback');
            const categoryStatsEl = document.getElementById('category-stats');
            
            finalScoreEl.textContent = `Skor Kamu: ${score} dari ${questions.length}`;
            
            // Tampilkan statistik per kategori
            let statsHTML = '';
            for (const [category, stats] of Object.entries(categoryScores)) {
                if (stats.total > 0) {
                    statsHTML += `
                        <div class="stat-row">
                            <span class="stat-label">${category}:</span>
                            <span class="stat-value">${stats.correct}/${stats.total}</span>
                        </div>
                    `;
                }
            }
            categoryStatsEl.innerHTML = statsHTML;
            
            if (score === questions.length) {
                starsEl.textContent = '⭐⭐⭐';
                finalFeedbackEl.textContent = '🏆 Sempurna!';
            } else if (score >= 7) {
                starsEl.textContent = '⭐⭐';
                finalFeedbackEl.textContent = '😊 Bagus Sekali!';
            } else {
                starsEl.textContent = '⭐';
                finalFeedbackEl.textContent = '💪 Terus Belajar!';
            }
        }

        function restartQuiz() {
            currentQuestion = 0;
            score = 0;
            categoryScores = {
                "Menghitung": { correct: 0, total: 0 },
                "Penjumlahan": { correct: 0, total: 0 },
                "Pengurangan": { correct: 0, total: 0 }
            };
            document.getElementById('score').textContent = score;
            document.getElementById('quiz-content').classList.remove('hidden');
            document.getElementById('result-content').classList.add('hidden');
            displayQuestion();
        }

        function onConfigChange(config) {
            document.getElementById('quiz-title').textContent = config.quiz_title || defaultConfig.quiz_title;
            document.getElementById('restart-btn').textContent = config.restart_button_text || defaultConfig.restart_button_text;
        }

        document.getElementById('restart-btn').addEventListener('click', restartQuiz);

        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig: defaultConfig,
                onConfigChange: async (config) => {
                    onConfigChange(config);
                },
                mapToCapabilities: (config) => ({
                    recolorables: [],
                    borderables: [],
                    fontEditable: undefined,
                    fontSizeable: undefined
                }),
                mapToEditPanelValues: (config) => new Map([
                    ["quiz_title", config.quiz_title || defaultConfig.quiz_title],
                    ["restart_button_text", config.restart_button_text || defaultConfig.restart_button_text]
                ])
            });
        }

        displayQuestion();
    </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9a001827d2f65f5c',t:'MTc2MzM5MTU5Mi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>