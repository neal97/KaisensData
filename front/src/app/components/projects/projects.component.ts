import { Component, OnInit } from '@angular/core';
import { ArticleService } from 'src/app/services/article.service';
import { OwlOptions } from 'ngx-owl-carousel-o';

@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.css']
})
export class ProjectsComponent implements OnInit {
  articles!: any[]
  customOptions: OwlOptions = {
    loop: false,
    mouseDrag: true,
    touchDrag: true,
    pullDrag: true,
    dots: true,
    navSpeed: 700,
    navText: ['', ''],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 2
      },
      1200: {
        items: 3
      }
    },
    nav: true
  }



  constructor(
    private articleService: ArticleService
  ) {}

ngOnInit(): void {
    this.articleService.getAll().subscribe({
      next: (res: any) => {
        this.articles = res
      }
    })
  }
}
