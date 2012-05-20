from images.models import *
from django.contrib import admin


class ImageSubmitAdmin(admin.ModelAdmin):
	list_display = ["title", "img_html"]

admin.site.register(ImageSubmit, ImageSubmitAdmin)
