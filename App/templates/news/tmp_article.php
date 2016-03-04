{% extends 'header.html' %}
{% block content %}
	<b>Название: {{ article.title }}</b>
	<br><hr>
	{{ article.content|nl2br }}
	<br><hr>
	{% if article.author %}
	    Автор: {{ article.author.name }}
    {% endif %}		
{% endblock %}