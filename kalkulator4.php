<!doctype html>
<html lang="id">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuis Matematika TK</title>
  <script src="/_sdk/element_sdk.js"></script>
  <script src="/_sdk/data_sdk.js"></script>
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
        
        .level-indicator {
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            color: #333;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 15px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
            box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3);
        }
        
        .stats-bar {
            display: flex;
            justify-content: space-around;
            margin-bottom: 15px;
            gap: 10px;
        }
        
        .stat-item {
            background: #f5f5f5;
            padding: 8px 12px;
            border-radius: 10px;
            font-size: 13px;
            flex: 1;
        }
        
        .stat-label {
            color: #666;
            font-size: 11px;
        }
        
        .stat-value {
            color: #e91e63;
            font-weight: bold;
            font-size: 16px;
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
        
        .restart-btn, .next-level-btn, .start-btn {
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
        
        .restart-btn:hover, .next-level-btn:hover, .start-btn:hover {
            transform: scale(1.05);
        }
        
        .next-level-btn {
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            color: #333;
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
        
        .stat-label-text {
            font-weight: bold;
            color: #333;
        }
        
        .stat-value-text {
            color: #e91e63;
            font-weight: bold;
        }
        
        .level-unlock {
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            padding: 15px;
            border-radius: 10px;
            margin: 15px 0;
            font-weight: bold;
            color: #333;
        }
        
        .name-input {
            width: 80%;
            padding: 12px;
            font-size: 16px;
            border: 2px solid #e91e63;
            border-radius: 10px;
            margin: 15px 0;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            text-align: center;
        }
        
        .welcome-screen {
            text-align: center;
        }
        
        .welcome-emoji {
            font-size: 60px;
            margin: 20px 0;
        }
        
        .loading {
            color: #e91e63;
            font-size: 14px;
            margin: 10px 0;
        }
    </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <div class="container">
   <div class="quiz-card">
    <h1 id="quiz-title">Kuis Matematika TK 🎈</h1><!-- Welcome Screen -->
    <div id="welcome-screen" class="welcome-screen">
     <div class="welcome-emoji">
      👋
     </div>
     <p style="font-size: 18px; color: #333; margin: 15px 0;">Halo! Siapa nama kamu?</p><input type="text" id="name-input" class="name-input" placeholder="Masukkan nama kamu" maxlength="20"> <br><button class="start-btn" id="start-btn">Mulai Main!</button>
     <div id="loading-message" class="loading hidden">
      Memuat data...
     </div>
    </div><!-- Quiz Content -->
    <div id="quiz-content" class="hidden">
     <div class="level-indicator" id="level-indicator">
      Level 1 - Mudah
     </div>
     <div class="stats-bar">
      <div class="stat-item">
       <div class="stat-label">
        Rekor
       </div>
       <div class="stat-value" id="highest-score">
        0
       </div>
      </div>
      <div class="stat-item">
       <div class="stat-label">
        Main
       </div>
       <div class="stat-value" id="total-games">
        0
       </div>
      </div>
     </div>
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
    </div><!-- Result Screen -->
    <div id="result-content" class="hidden">
     <div class="stars" id="stars"></div>
     <div class="final-score" id="final-score"></div>
     <div class="category-stats" id="category-stats"></div>
     <div class="level-unlock hidden" id="level-unlock">
      🎉 Level Baru Terbuka!
     </div>
     <div class="feedback" id="final-feedback"></div><button class="next-level-btn hidden" id="next-level-btn">Level Berikutnya</button> <button class="restart-btn" id="restart-btn">Main Lagi</button>
    </div>
   </div>
  </div>
  <script>
        const defaultConfig = {
            quiz_title: "Kuis Matematika TK 🎈",
            restart_button_text: "Main Lagi"
        };

        // Level definitions
        const levels = {
            1: { name: "Mudah", maxNumber: 10, passScore: 6 },
            2: { name: "Sedang", maxNumber: 15, passScore: 7 },
            3: { name: "Sulit", maxNumber: 20, passScore: 8 }
        };

        let currentLevel = 1;
        let currentQuestion = 0;
        let score = 0;
        let answered = false;
        let playerData = null;
        let allPlayerData = [];
        let categoryScores = {
            "Menghitung": { correct: 0, total: 0 },
            "Penjumlahan": { correct: 0, total: 0 },
            "Pengurangan": { correct: 0, total: 0 }
        };

        // Generate questions based on level
        function generateQuestions(level) {
            const maxNum = levels[level].maxNumber;
            const questions = [];
            
            // 2 counting questions
            questions.push(
                { emoji: "🍎", count: Math.floor(Math.random() * (maxNum - 5)) + 6, operation: "count", category: "Menghitung" },
                { emoji: "⭐", count: Math.floor(Math.random() * (maxNum - 5)) + 4, operation: "count", category: "Menghitung" }
            );
            
            // 4 addition questions
            for (let i = 0; i < 4; i++) {
                const num1 = Math.floor(Math.random() * (maxNum - 3)) + 3;
                const num2 = Math.floor(Math.random() * (maxNum - num1)) + 2;
                const emojis = ["🐟", "🦋", "🍓", "🎨"];
                questions.push({ emoji: emojis[i], num1, num2, operation: "add", category: "Penjumlahan" });
            }
            
            // 4 subtraction questions
            for (let i = 0; i < 4; i++) {
                const num1 = Math.floor(Math.random() * (maxNum - 5)) + 6;
                const num2 = Math.floor(Math.random() * (num1 - 2)) + 1;
                const emojis = ["🌸", "🎈", "🌈", "🚀"];
                questions.push({ emoji: emojis[i], num1, num2, operation: "subtract", category: "Pengurangan" });
            }
            
            return questions;
        }

        let questions = generateQuestions(currentLevel);

        // Data SDK Handler
        const dataHandler = {
            onDataChanged(data) {
                allPlayerData = data;
                if (playerData && playerData.__backendId) {
                    const updated = data.find(p => p.__backendId === playerData.__backendId);
                    if (updated) {
                        playerData = updated;
                        updateStatsDisplay();
                    }
                }
            }
        };

        // Initialize Data SDK
        async function initDataSDK() {
            if (window.dataSdk) {
                const result = await window.dataSdk.init(dataHandler);
                if (!result.isOk) {
                    console.error("Failed to initialize Data SDK");
                }
            }
        }
        
        // Call init immediately
        initDataSDK();

        function updateStatsDisplay() {
            if (playerData) {
                document.getElementById('highest-score').textContent = playerData.highest_score || 0;
                document.getElementById('total-games').textContent = playerData.total_games || 0;
                currentLevel = playerData.current_level || 1;
                updateLevelIndicator();
            }
        }

        function updateLevelIndicator() {
            const levelInfo = levels[currentLevel];
            document.getElementById('level-indicator').textContent = `Level ${currentLevel} - ${levelInfo.name}`;
        }

        async function startGame() {
            const nameInput = document.getElementById('name-input');
            const playerName = nameInput.value.trim();
            
            if (!playerName) {
                nameInput.style.borderColor = '#fc4a1a';
                nameInput.placeholder = 'Nama tidak boleh kosong!';
                return;
            }
            
            const loadingMsg = document.getElementById('loading-message');
            const startBtn = document.getElementById('start-btn');
            
            loadingMsg.classList.remove('hidden');
            loadingMsg.textContent = 'Memuat data...';
            startBtn.disabled = true;
            
            try {
                // Check if player exists
                const existingPlayer = allPlayerData.find(p => p.player_name === playerName);
                
                if (existingPlayer) {
                    playerData = existingPlayer;
                    currentLevel = playerData.current_level || 1;
                } else {
                    // Create new player
                    const newPlayer = {
                        player_name: playerName,
                        current_level: 1,
                        highest_score: 0,
                        total_games: 0,
                        last_played: new Date().toISOString()
                    };
                    
                    if (window.dataSdk) {
                        const result = await window.dataSdk.create(newPlayer);
                        if (result.isOk) {
                            // Wait for onDataChanged to update
                            await new Promise(resolve => setTimeout(resolve, 800));
                            playerData = allPlayerData.find(p => p.player_name === playerName);
                            if (!playerData) {
                                playerData = { ...newPlayer, current_level: 1 };
                            }
                        } else {
                            loadingMsg.textContent = 'Gagal menyimpan data. Coba lagi.';
                            startBtn.disabled = false;
                            return;
                        }
                    } else {
                        // Fallback if SDK not available
                        playerData = { ...newPlayer, current_level: 1 };
                    }
                }
                
                currentLevel = playerData.current_level || 1;
                questions = generateQuestions(currentLevel);
                
                document.getElementById('welcome-screen').classList.add('hidden');
                document.getElementById('quiz-content').classList.remove('hidden');
                updateStatsDisplay();
                displayQuestion();
            } catch (error) {
                loadingMsg.textContent = 'Terjadi kesalahan. Coba lagi.';
                startBtn.disabled = false;
            }
        }

        function generateOptions(correctAnswer) {
            const options = [correctAnswer];
            while (options.length < 4) {
                const random = Math.max(1, correctAnswer + Math.floor(Math.random() * 8) - 4);
                if (!options.includes(random) && random <= 15) {
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
            
            badgeEl.classList.remove('category-count', 'category-add', 'category-subtract');
            
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

        async function showResults() {
            document.getElementById('quiz-content').classList.add('hidden');
            document.getElementById('result-content').classList.remove('hidden');
            
            const starsEl = document.getElementById('stars');
            const finalScoreEl = document.getElementById('final-score');
            const finalFeedbackEl = document.getElementById('final-feedback');
            const categoryStatsEl = document.getElementById('category-stats');
            const levelUnlockEl = document.getElementById('level-unlock');
            const nextLevelBtn = document.getElementById('next-level-btn');
            
            finalScoreEl.textContent = `Skor Kamu: ${score} dari ${questions.length}`;
            
            // Category stats
            let statsHTML = '';
            for (const [category, stats] of Object.entries(categoryScores)) {
                if (stats.total > 0) {
                    statsHTML += `
                        <div class="stat-row">
                            <span class="stat-label-text">${category}:</span>
                            <span class="stat-value-text">${stats.correct}/${stats.total}</span>
                        </div>
                    `;
                }
            }
            categoryStatsEl.innerHTML = statsHTML;
            
            // Check level unlock
            const levelInfo = levels[currentLevel];
            const passed = score >= levelInfo.passScore;
            const canUnlock = passed && currentLevel < 3;
            
            if (score === questions.length) {
                starsEl.textContent = '⭐⭐⭐';
                finalFeedbackEl.textContent = '🏆 Sempurna!';
            } else if (score >= levelInfo.passScore) {
                starsEl.textContent = '⭐⭐';
                finalFeedbackEl.textContent = '😊 Bagus Sekali!';
            } else {
                starsEl.textContent = '⭐';
                finalFeedbackEl.textContent = '💪 Terus Belajar!';
            }
            
            if (canUnlock) {
                levelUnlockEl.classList.remove('hidden');
                nextLevelBtn.classList.remove('hidden');
            } else {
                levelUnlockEl.classList.add('hidden');
                nextLevelBtn.classList.add('hidden');
            }
            
            // Update player data
            if (playerData && playerData.__backendId && window.dataSdk) {
                const updatedData = {
                    ...playerData,
                    highest_score: Math.max(playerData.highest_score || 0, score),
                    total_games: (playerData.total_games || 0) + 1,
                    current_level: canUnlock ? currentLevel + 1 : playerData.current_level,
                    last_played: new Date().toISOString()
                };
                
                const result = await window.dataSdk.update(updatedData);
                if (result.isOk) {
                    // Wait for onDataChanged to sync
                    await new Promise(resolve => setTimeout(resolve, 300));
                }
            } else if (playerData) {
                // Update locally if no backend
                playerData.highest_score = Math.max(playerData.highest_score || 0, score);
                playerData.total_games = (playerData.total_games || 0) + 1;
                playerData.current_level = canUnlock ? currentLevel + 1 : playerData.current_level;
                updateStatsDisplay();
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
            questions = generateQuestions(currentLevel);
            document.getElementById('score').textContent = score;
            document.getElementById('quiz-content').classList.remove('hidden');
            document.getElementById('result-content').classList.add('hidden');
            displayQuestion();
        }

        function nextLevel() {
            if (currentLevel < 3) {
                currentLevel++;
                restartQuiz();
            }
        }

        function onConfigChange(config) {
            document.getElementById('quiz-title').textContent = config.quiz_title || defaultConfig.quiz_title;
            document.getElementById('restart-btn').textContent = config.restart_button_text || defaultConfig.restart_button_text;
        }

        document.getElementById('start-btn').addEventListener('click', startGame);
        document.getElementById('restart-btn').addEventListener('click', restartQuiz);
        document.getElementById('next-level-btn').addEventListener('click', nextLevel);
        
        document.getElementById('name-input').addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                startGame();
            }
        });

        // Initialize Element SDK
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
    </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9a03b29e8686e778',t:'MTc2MzQyOTM3Ni4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>