<section id="contact" class="section contact-terminal">
    <div class="terminal-header">
        <div class="terminal-title-bar">
            <div class="terminal-dots">
                <span class="dot red"></span>
                <span class="dot yellow"></span>
                <span class="dot green"></span>
            </div>
            <div class="terminal-title">contact_form.exe</div>
            <div class="terminal-actions">
                <button class="term-btn minimize">−</button>
                <button class="term-btn maximize">□</button>
                <button class="term-btn close">×</button>
            </div>
        </div>
        
        <div class="terminal-body">
            <!-- Welcome message with typing effect -->
            <div class="terminal-line typing">
                <span class="prompt">$</span>
                <span class="command">contact_form --init</span>
            </div>
            
            <div class="terminal-line output">
                <span class="output-text">Initializing contact form...</span>
            </div>
            
            <div class="terminal-line output">
                <span class="output-text">Welcome to our contact terminal. Please fill in your details:</span>
            </div>
        </div>
    </div>

    <div class="terminal-form-wrapper">
        <form class="terminal-form" id="contactForm" action="#contact" method="POST">
            @csrf

            <!-- Terminal Form Groups -->
            <div class="term-group">
                <div class="term-prompt">
                    <span class="prompt">></span>
                    <span class="field-label">full_name:</span>
                </div>
                <input type="text" 
                       id="fullName" 
                       name="name" 
                       required 
                       class="term-input"
                       placeholder="Type your full name..."
                       data-typing="true">
                <div class="term-cursor"></div>
            </div>

            <div class="term-group">
                <div class="term-prompt">
                    <span class="prompt">></span>
                    <span class="field-label">email_address:</span>
                </div>
                <input type="email" 
                       id="email" 
                       name="email" 
                       required 
                       class="term-input"
                       placeholder="user@domain.com"
                       data-typing="true">
                <div class="term-cursor"></div>
            </div>

            <!-- Service Select with Terminal Style -->
            <div class="term-group">
                <div class="term-prompt">
                    <span class="prompt">></span>
                    <span class="field-label">service_plan:</span>
                </div>
                <div class="term-select-wrapper">
                    <select id="serviceSelect" name="service" required class="term-select">
                        <option value="" disabled selected>Select service...</option>
                        <!-- Web Services -->
                        <optgroup label="Web Development" class="optgroup-label">
                            <option value="web-starter">Starter Website</option>
                            <option value="web-professional">Professional Website</option>
                            <option value="web-enterprise">Enterprise Web Platform</option>
                        </optgroup>
                        <!-- ERP Services -->
                        <optgroup label="ERP Systems" class="optgroup-label">
                            <option value="erp-starter">ERP – Starter Plan</option>
                            <option value="erp-professional">ERP – Professional Plan</option>
                            <option value="erp-enterprise">ERP – Enterprise Plan</option>
                        </optgroup>
                        <!-- Security & IT -->
                        <optgroup label="Security & IT Solutions" class="optgroup-label">
                            <option value="security-audit">Security Audit</option>
                            <option value="it-support">IT Support & Maintenance</option>
                            <option value="email-config">Business Email Configuration</option>
                        </optgroup>
                    </select>
                    <div class="term-select-arrow">▼</div>
                </div>
            </div>

            <!-- Message with Multi-line Support -->
            <div class="term-group message-group">
                <div class="term-prompt">
                    <span class="prompt">></span>
                    <span class="field-label">message:</span>
                </div>
                <div class="term-textarea-wrapper">
                    <div class="line-numbers">
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>5</span>
                    </div>
                    <textarea 
                        id="message" 
                        name="message" 
                        required 
                        class="term-textarea"
                        placeholder="Type your message here..."
                        rows="5"
                        data-typing="true"></textarea>
                    <div class="term-textarea-cursor"></div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="term-group submit-group">
                <div class="term-prompt">
                    <span class="prompt">$</span>
                    <span class="command">send_message</span>
                </div>
                <button type="submit" class="term-submit-btn">
                    <span class="btn-text">Execute</span>
                    <span class="btn-loader">
                        <span class="loader-dot"></span>
                        <span class="loader-dot"></span>
                        <span class="loader-dot"></span>
                    </span>
                </button>
            </div>

            <!-- Status Output -->
            <div class="terminal-output">
                <div class="status-line">
                    <span class="status-prompt">[status]</span>
                    <span class="status-text" id="formStatus">Ready to receive input...</span>
                </div>
                <div class="typing-indicator">
                    <span>█</span>
                </div>
            </div>
        </form>
    </div>

    <!-- Terminal Footer -->
    <div class="terminal-footer">
        <div class="footer-line">
            <span class="prompt">$</span>
            <span class="command">help --contact</span>
        </div>
        <div class="footer-line">
            <span class="output-text">Press TAB to navigate • CTRL+ENTER to submit • ESC to reset</span>
        </div>
    </div>
</section>