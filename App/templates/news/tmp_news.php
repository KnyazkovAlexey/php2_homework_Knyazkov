{% extends 'header.html' %}
{% block content %}
	<br>
	<b>Новости:</b>
	<br>	
    {% for article in articles %}
	    <br>
        <a href="/News/One/?id={{ article.id }}">{{ article.title }}</a>
		<br>
		{% if article.author %}
		  Автор: {{ article.author.name }}
        {% endif %}	
	    <hr>
    {% else %}	
        список пуст    	
    {% endfor %}	
{% endblock %}

